<?php
    include 'connection.php';
    session_start();
    if(isset($_POST['submit'])) {
        $item = $_POST['item'];
        $Item_description = $_POST['Item_description'];
        $pickup_address = $_POST['pickup_address'];
        $delivery_address = $_POST['delivery_address'];
        $weight = $_POST['weight'];
        $createdBy = $_SESSION['username'];
        $item_nature = $_POST['item_nature'];
        $service_selected = $_POST['service_selected'];
        $pickup_address_country = $_POST['pickup_address_country'];
        $delivery_address_country = $_POST['delivery_address_country'];



      if(!$item || !$Item_description || !$pickup_address) {
          echo"
            <script>
              alert('Please fill all the fields');
              window.location.href='orders.php';
            </script>
          ";
          return;
        }
        

      $weightCost=0;

        if($weight == "Upto 1KG") {
          $weightCost =200;
        }
        else if($weight == "1KG - 10 KG") {
          $weightCost =400;
        }
        else if($weight == "10KG - 50KG") {
          $weightCost =600;
        }
        else if($weight == "50KG - 100KG") {
          $weightCost =800;
        }
        else {
          $weightCost =1000;
        }
  

      $itemNatureCost=0;

        if($item_nature == "Fragile Items") {
          $itemNatureCost =300;
        }
        else if($item_nature == "Non-Fragile Items") {
          $itemNatureCost =500;
        }
        else if($item_nature == "Perishable Items") {
          $itemNatureCost =600;
        }
        else if($item_nature == "Hazardous Items") {
          $itemNatureCost =700;
        }
        else if($item_nature == "Oversized Items") {
          $itemNatureCost =1300;
        }
        else {
          $itemNatureCost =1500;
        }


      $serviceselectedCost=0;

        if($service_selected == "Express Parcel") {
          $serviceselectedCost =1200;
        }
        else if($service_selected == "Partial Truckload Freight") {
          $serviceselectedCost =1000;
        }
        else if($service_selected == "Truckload Freight") {
          $serviceselectedCost =3000;
        }
        else if($service_selected == "Cross Border Service") {
          $serviceselectedCost =10000;
        }
        else {
          $serviceselectedCost =2500;
        }
  
  
        $totalCost = $weightCost + $itemNatureCost + $serviceselectedCost;
        $sql = "INSERT INTO `orders` (`item`, `Item_description`, `pickup_address`, `delivery_address`, `weight`, `created_by`,`item_nature`,`service_selected`,`pickup_address_country`,`delivery_address_country`,`amount`) VALUES ('$item', '$Item_description','$pickup_address','$delivery_address','$weight','$createdBy','$item_nature','$service_selected','$pickup_address_country','$delivery_address_country','$totalCost')";
        $result = mysqli_query($con, $sql);

        if($result) {
            echo"
              <script>
                alert('Order Successfully Created');
                window.location.href='display.php';
              </script>
            ";
        } else {
            die(mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container my-5">
<form method="post">

  <div class="form-group">
    <label> Item </label>
    <input type="text" class="form-control"  placeholder="Item" name='item'>
  </div>

  <div class="form-group">
    <label> Item Description </label>
    <input type="text" class="form-control"  placeholder="Item Description" name='Item_description'>
  </div>

  <div class="form-group">
    <label> Pickup Address </label>
    <input type="text" class="form-control"  placeholder="Pickup address" name='pickup_address'>
  </div>



  <div class="form-group">
    <label for="Pickup Address Country">Choose Pickup Address Country:</label><br>
    <select class="form-control" name='pickup_address_country'>
    <option>country</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Aland Islands">Åland Islands</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antarctica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua & Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bonaire, Sint Eustatius and Saba">Caribbean Netherlands</option>
    <option value="Bosnia and Herzegovina">Bosnia & Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo - Brazzaville</option>
    <option value="Congo, Democratic Republic of the Congo">Congo - Kinshasa</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cote D'Ivoire">Côte d’Ivoire</option>
    <option value="Croatia">Croatia</option>
    <option value="Cuba">Cuba</option>
    <option value="Curacao">Curaçao</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czechia</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Malvinas)">Falkland Islands (Islas Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guernsey">Guernsey</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard Island and Mcdonald Islands">Heard & McDonald Islands</option>
    <option value="Holy See (Vatican City State)">Vatican City</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran, Islamic Republic of">Iran</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Isle of Man">Isle of Man</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jersey">Jersey</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea, Democratic People's Republic of">North Korea</option>
    <option value="Korea, Republic of">South Korea</option>
    <option value="Kosovo">Kosovo</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic">Laos</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Macedonia, the Former Yugoslav Republic of">North Macedonia</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia, Federated States of">Micronesia</option>
    <option value="Moldova, Republic of">Moldova</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montenegro">Montenegro</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar (Burma)</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Curaçao</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestinian Territory, Occupied">Palestine</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn Islands</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Réunion</option>
    <option value="Romania">Romania</option>
    <option value="Russian Federation">Russia</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Barthelemy">St. Barthélemy</option>
    <option value="Saint Helena">St. Helena</option>
    <option value="Saint Kitts and Nevis">St. Kitts & Nevis</option>
    <option value="Saint Lucia">St. Lucia</option>
    <option value="Saint Martin">St. Martin</option>
    <option value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option>
    <option value="Saint Vincent and the Grenadines">St. Vincent & Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">São Tomé & Príncipe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia">Serbia</option>
    <option value="Serbia and Montenegro">Serbia</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Sint Maarten">Sint Maarten</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia and the South Sandwich Islands">South Georgia & South Sandwich Islands</option>
    <option value="South Sudan">South Sudan</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option>
    <option value="Swaziland">Eswatini</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic">Syria</option>
    <option value="Taiwan, Province of China">Taiwan</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania, United Republic of">Tanzania</option>
    <option value="Thailand">Thailand</option>
    <option value="Timor-Leste">Timor-Leste</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad & Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands">Turks & Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viet Nam">Vietnam</option>
    <option value="Virgin Islands, British">British Virgin Islands</option>
    <option value="Virgin Islands, U.s.">U.S. Virgin Islands</option>
    <option value="Wallis and Futuna">Wallis & Futuna</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
    </select>
  </div>



  <div class="form-group">
    <label> Delivery Address </label>
    <input type="text" class="form-control"  placeholder="Delivery Address" name='delivery_address'>
  </div>



  <div class="form-group">
    <label for="Delivery Address Country">Choose Delivery Address Country:</label><br>
    <select class="form-control" name='delivery_address_country'>
    <option>country</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Aland Islands">Åland Islands</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antarctica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua & Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bonaire, Sint Eustatius and Saba">Caribbean Netherlands</option>
    <option value="Bosnia and Herzegovina">Bosnia & Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo - Brazzaville</option>
    <option value="Congo, Democratic Republic of the Congo">Congo - Kinshasa</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cote D'Ivoire">Côte d’Ivoire</option>
    <option value="Croatia">Croatia</option>
    <option value="Cuba">Cuba</option>
    <option value="Curacao">Curaçao</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czechia</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Malvinas)">Falkland Islands (Islas Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guernsey">Guernsey</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard Island and Mcdonald Islands">Heard & McDonald Islands</option>
    <option value="Holy See (Vatican City State)">Vatican City</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran, Islamic Republic of">Iran</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Isle of Man">Isle of Man</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jersey">Jersey</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea, Democratic People's Republic of">North Korea</option>
    <option value="Korea, Republic of">South Korea</option>
    <option value="Kosovo">Kosovo</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic">Laos</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Macedonia, the Former Yugoslav Republic of">North Macedonia</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia, Federated States of">Micronesia</option>
    <option value="Moldova, Republic of">Moldova</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montenegro">Montenegro</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar (Burma)</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Curaçao</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestinian Territory, Occupied">Palestine</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn Islands</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Réunion</option>
    <option value="Romania">Romania</option>
    <option value="Russian Federation">Russia</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Barthelemy">St. Barthélemy</option>
    <option value="Saint Helena">St. Helena</option>
    <option value="Saint Kitts and Nevis">St. Kitts & Nevis</option>
    <option value="Saint Lucia">St. Lucia</option>
    <option value="Saint Martin">St. Martin</option>
    <option value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option>
    <option value="Saint Vincent and the Grenadines">St. Vincent & Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">São Tomé & Príncipe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia">Serbia</option>
    <option value="Serbia and Montenegro">Serbia</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Sint Maarten">Sint Maarten</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia and the South Sandwich Islands">South Georgia & South Sandwich Islands</option>
    <option value="South Sudan">South Sudan</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option>
    <option value="Swaziland">Eswatini</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic">Syria</option>
    <option value="Taiwan, Province of China">Taiwan</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania, United Republic of">Tanzania</option>
    <option value="Thailand">Thailand</option>
    <option value="Timor-Leste">Timor-Leste</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad & Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands">Turks & Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viet Nam">Vietnam</option>
    <option value="Virgin Islands, British">British Virgin Islands</option>
    <option value="Virgin Islands, U.s.">U.S. Virgin Islands</option>
    <option value="Wallis and Futuna">Wallis & Futuna</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
    </select>
  </div>


  <div class="form-group">
  <label for="Item Weight">Choose Weight:</label><br>
    <select class="form-control" name='weight'>
      <option>Select Item Weight</option>
      <option value="Upto 1KG">Small Items: Upto 1KG = (Examples include letters, documents, and small parcels.)</option>
      <option value="1KG - 10 KG">Medium Items: 1KG - 10 KG = (Examples include small electronics, books, and clothing.)</option>
      <option value="10KG - 50KG">Large Items: 10KG - 50KG = (Examples include larger electronics, sports equipment, and musical instruments.)</option>
      <option value="50KG - 100KG">Heavy Items: 50KG - 100KG = (Examples include machinery, furniture, and large appliances.)</option>
      <option value="Over 100KG">Overweight Items: Over 100KG = (Examples include industrial equipment, construction materials, and oversized machinery.)</option>
    </select>
  </div>

  <div class="form-group">
    <label for="Item Nature">Choose Item Nature:</label><br>
    <select class="form-control" name='item_nature'>
      <option>Select Item Nature</option>
      <option value="Fragile Items">Fragile Items  :  (Items that are delicate and require extra care during transportation. Examples include glassware, ceramics, electronics, and artwork.)</option>
      <option value="Non-Fragile Items">Non-Fragile Items  :  (Items that are not delicate and can withstand normal handling during transportation. Examples include clothing, books, toys, and non-electronic household items.)</option>
      <option value="Perishable Items">Perishable Items  :  (Items that have a limited shelf life and require special handling to maintain their freshness. Examples include food, flowers, and medical supplies.)</option>
      <option value="Hazardous Items">Hazardous Items  :  (Items that are potentially dangerous or harmful if not handled correctly. Examples include chemicals, and batteries)</option>
      <option value="Oversized Items">Oversized Items  :  (Items that are larger than the standard size for transportation and require special arrangements for delivery. Examples include furniture, machinery, and vehicles.)</option>
      <option value="Valuable Items">Valuable Items  :  (Items that are high in value and require additional security measures during transportation. Examples include jewelry, cash, and important documents.)</option>
    </select>
  </div>

  <div class="form-group">
    <label for="Services">Choose a Service:</label><br>
    <select class="form-control" name='service_selected'>
      <option>Select a Service</option>
      <option value="Express Parcel">Express Parcel</option>
      <option value="Partial Truckload Freight">Partial Truckload Freight</option>
      <option value="Truckload Freight">Truckload Freight</option>
      <option value="Cross Border Service">Cross Border Service</option>
      <option value="Supply Chain Service">Supply Chain Service</option>
    </select>
  </div>

  <center>
    <button type="submit" class="btn btn-primary" name='submit'>Create Order</button>
  </center>

</form>
</div>
</body>
</html>