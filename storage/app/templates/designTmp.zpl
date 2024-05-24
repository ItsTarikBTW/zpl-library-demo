^XA

^FX Top section with logo, name and address.
^CF0,60
^FO50,50^GB100,100,100^FS
^FO75,75^FR^GB100,100,100^FS
^FO93,93^GB40,40,40^FS
^FO220,50^FD{{company_name}}^FS
^CF0,30
^FO220,115^FD{{shipping_lane}}^FS
^FO220,155^FD{{city_zip}}^FS
^FO220,195^FD{{country}}^FS
^FO50,250^GB700,3,3^FS

^FX Second section with recipient address and permit information.
^CFA,30
^FO50,300^FD{{recipient_name}}^FS
^FO50,340^FD{{recipient_address}}^FS
^FO50,380^FD{{recipient_city_zip}}^FS
^FO50,420^FD{{recipient_country}}^FS
^CFA,15
^FO600,300^GB150,150,3^FS
^FO638,340^FDPermit^FS
^FO638,390^FD{{permit_number}}^FS
^FO50,500^GB700,3,3^FS

^FX Third section with bar code.
^BY5,2,270
^FO100,550^BC^FD{{barcode_num}}^FS

^FX Fourth section (the two boxes on the bottom).
^FO50,900^GB700,250,3^FS
^FO400,900^GB3,250,3^FS
^CF0,40
^FO100,960^FD{{reference_1}}^FS
^FO100,1010^FD{{reference_2}}^FS
^FO100,1060^FD{{reference_3}}^FS
^CF0,190
^FO470,955^FD{{ca_label}}^FS

^XZ
