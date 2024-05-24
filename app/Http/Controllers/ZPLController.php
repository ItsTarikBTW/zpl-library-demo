<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class ZPLController extends Controller {
    // upload a template
    public function uploadTemplate(Request $request) {
        // Validate the uploaded file
        $request->validate([
            'name' => 'required|string|max:255',
            'template' => 'required|mimes:xml|max:2048',
        ]);

        // Store the uploaded file
        $file = $request->file('template');
        $path = $file->store('templates');

        // Create a new template record in the database
        $template = new Template();
        $template->name = $request->name;
        $template->file_path = $path;
        $template->save();

        return response()->json(['message' => 'Template uploaded successfully']);
    }

    public function generate(Request $request, $id) {
        $template = Template::findOrFail($id);
        $data = $request->all();

        // Check if the file_path is an absolute path
        $filePath = $template->file_path;
        if (realpath($filePath) === false) {
            $filePath = storage_path('app/' . $filePath);
        }

        // Read the XML content from the file
        $xmlContent = file_get_contents($filePath);

        $elements = $this->parseTemplate($xmlContent, $data);
        $zpl = $this->generateZPL($elements);
        return response()->json(['zpl' => $zpl]);
    }
    private function parseTemplate($xmlContent, $data) {
        $xml = simplexml_load_string($xmlContent);
        $elements = [];
        foreach ($xml->section as $section) {
            $content = (string)$section->content;
            if (isset($section->data_key) && isset($data[(string)$section->data_key])) {
                $content = $data[(string)$section->data_key];
            }
            $elements[] = [
                'data_key' => (string)$section->data_key,
                'content' => $content
            ];
        }
        return $elements;
    }

    private function generateZPL($elements) {
        // Read the ZPL template from a file
        $filePath = storage_path('app/templates/designTmp.zpl');
        $zpl = file_get_contents($filePath);

        // Replace placeholders with actual data
        foreach ($elements as $element) {
            $zpl = str_replace("{{" . $element['data_key'] . "}}", $element['content'], $zpl);
        }

        // Save the ZPL code to a file
        $directoryPath = storage_path('app/zpl');
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        $filePath = $directoryPath . '/' . time() . '.zpl';
        file_put_contents($filePath, $zpl);

        return $filePath;
    }

}
