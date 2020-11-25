<?php

/**
 * **************************************************************
 * HTML MACROS
 * **************************************************************.
 */


Form::component('submitBtns', 'components.forms.submitBtns', ['name', 'value', 'attributes']);

Form::component('textField', 'components.forms.textField', ['name', 'value', 'attributes']);
Form::component('emailField', 'components.forms.emailField', ['name', 'value', 'attributes']);

Form::component('passwordField', 'components.forms.passwordField', ['name', 'value', 'attributes']);

Form::component('textareaField', 'components.forms.textareaField', ['name', 'value', 'attributes']);

Form::component('selectField', 'components.forms.selectField', ['name', 'value', 'attributes']);


Form::macro('emailField', function ($name, $label = null, $value = null, $attributes = []) {
    $element = Form::email($name, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('passwordField', function ($name, $label = null, $value = null, $attributes = []) {
    $element = Form::password($name, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('selectField', function ($name, $options, $label = null, $value = null, $attributes = []) {
    //$options = array_sort_recursive($options);

    $options = array_add($options, '', ' - - ' . __('mesydel.select') . ' - - ');

    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('country', function ($name, $options, $label = null, $value = null, $attributes = []) {
    $options = [
    "AF" => "Afghanistan",
    "AX" => "Åland Islands",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia, Plurinational State of",
    "BQ" => "Bonaire, Sint Eustatius and Saba",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "IO" => "British Indian Ocean Territory",
    "BN" => "Brunei Darussalam",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos (Keeling) Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo",
    "CD" => "Congo, the Democratic Republic of the",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "CI" => "Côte d'Ivoire",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CW" => "Curaçao",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands (Malvinas)",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-Bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and McDonald Islands",
    "VA" => "Holy See (Vatican City State)",
    "HN" => "Honduras",
    "HK" => "Hong Kong",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran, Islamic Republic of",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KP" => "Korea, Democratic People's Republic of",
    "KR" => "Korea, Republic of",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Lao People's Democratic Republic",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macao",
    "MK" => "Macedonia, the former Yugoslav Republic of",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "MX" => "Mexico",
    "FM" => "Micronesia, Federated States of",
    "MD" => "Moldova, Republic of",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territory, Occupied",
    "PA" => "Panama",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RE" => "Réunion",
    "RO" => "Romania",
    "RU" => "Russian Federation",
    "RW" => "Rwanda",
    "BL" => "Saint Barthélemy",
    "SH" => "Saint Helena, Ascension and Tristan da Cunha",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "MF" => "Saint Martin (French part)",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and the Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "ST" => "Sao Tome and Principe",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SX" => "Sint Maarten (Dutch part)",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and the South Sandwich Islands",
    "SS" => "South Sudan",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syrian Arab Republic",
    "TW" => "Taiwan, Province of China",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania, United Republic of",
    "TH" => "Thailand",
    "TL" => "Timor-Leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "UM" => "United States Minor Outlying Islands",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VE" => "Venezuela, Bolivarian Republic of",
    "VN" => "Viet Nam",
    "VG" => "Virgin Islands, British",
    "VI" => "Virgin Islands, U.S.",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe",
     ];

    $options = array_add($options, '', ' - - ' . __('mesydel.select') . ' - - ');

    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('timeZone', function ($name, $options, $label = null, $value = null, $attributes = []) {
    $options = [
    'Pacific/Midway' => '(GMT-11:00) Midway Island',
    'US/Samoa' => '(GMT-11:00) Samoa',
    'US/Hawaii' => '(GMT-10:00) Hawaii',
    'US/Alaska' => '(GMT-09:00) Alaska',
    'US/Pacific' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
    'America/Tijuana' => '(GMT-08:00) Tijuana',
    'US/Arizona' => '(GMT-07:00) Arizona',
    'US/Mountain' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
    'America/Chihuahua' => '(GMT-07:00) Chihuahua',
    'America/Mazatlan' => '(GMT-07:00) Mazatlan',
    'America/Mexico_City' => '(GMT-06:00) Mexico City',
    'America/Monterrey' => '(GMT-06:00) Monterrey',
    'Canada/Saskatchewan' => '(GMT-06:00) Saskatchewan',
    'US/Central' => '(GMT-06:00) Central Time (US &amp; Canada)',
    'US/Eastern' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
    'US/East-Indiana' => '(GMT-05:00) Indiana (East)',
    'America/Bogota' => '(GMT-05:00) Bogota',
    'America/Lima' => '(GMT-05:00) Lima',
    'America/Caracas' => '(GMT-04:30) Caracas',
    'Canada/Atlantic' => '(GMT-04:00) Atlantic Time (Canada)',
    'America/La_Paz' => '(GMT-04:00) La Paz',
    'America/Santiago' => '(GMT-04:00) Santiago',
    'Canada/Newfoundland' => '(GMT-03:30) Newfoundland',
    'America/Buenos_Aires' => '(GMT-03:00) Buenos Aires',
    'Greenland' => '(GMT-03:00) Greenland',
    'Atlantic/Stanley' => '(GMT-02:00) Stanley',
    'Atlantic/Azores' => '(GMT-01:00) Azores',
    'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.',
    'Africa/Casablanca' => '(GMT) Casablanca',
    'Europe/Dublin' => '(GMT) Dublin',
    'Europe/Lisbon' => '(GMT) Lisbon',
    'Europe/London' => '(GMT) London',
    'Africa/Monrovia' => '(GMT) Monrovia',
    'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
    'Europe/Belgrade' => '(GMT+01:00) Belgrade',
    'Europe/Berlin' => '(GMT+01:00) Berlin',
    'Europe/Bratislava' => '(GMT+01:00) Bratislava',
    'Europe/Brussels' => '(GMT+01:00) Brussels',
    'Europe/Budapest' => '(GMT+01:00) Budapest',
    'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
    'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
    'Europe/Madrid' => '(GMT+01:00) Madrid',
    'Europe/Paris' => '(GMT+01:00) Paris',
    'Europe/Prague' => '(GMT+01:00) Prague',
    'Europe/Rome' => '(GMT+01:00) Rome',
    'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
    'Europe/Skopje' => '(GMT+01:00) Skopje',
    'Europe/Stockholm' => '(GMT+01:00) Stockholm',
    'Europe/Vienna' => '(GMT+01:00) Vienna',
    'Europe/Warsaw' => '(GMT+01:00) Warsaw',
    'Europe/Zagreb' => '(GMT+01:00) Zagreb',
    'Europe/Athens' => '(GMT+02:00) Athens',
    'Europe/Bucharest' => '(GMT+02:00) Bucharest',
    'Africa/Cairo' => '(GMT+02:00) Cairo',
    'Africa/Harare' => '(GMT+02:00) Harare',
    'Europe/Helsinki' => '(GMT+02:00) Helsinki',
    'Europe/Istanbul' => '(GMT+02:00) Istanbul',
    'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
    'Europe/Kiev' => '(GMT+02:00) Kyiv',
    'Europe/Minsk' => '(GMT+02:00) Minsk',
    'Europe/Riga' => '(GMT+02:00) Riga',
    'Europe/Sofia' => '(GMT+02:00) Sofia',
    'Europe/Tallinn' => '(GMT+02:00) Tallinn',
    'Europe/Vilnius' => '(GMT+02:00) Vilnius',
    'Asia/Baghdad' => '(GMT+03:00) Baghdad',
    'Asia/Kuwait' => '(GMT+03:00) Kuwait',
    'Africa/Nairobi' => '(GMT+03:00) Nairobi',
    'Asia/Riyadh' => '(GMT+03:00) Riyadh',
    'Europe/Moscow' => '(GMT+03:00) Moscow',
    'Asia/Tehran' => '(GMT+03:30) Tehran',
    'Asia/Baku' => '(GMT+04:00) Baku',
    'Europe/Volgograd' => '(GMT+04:00) Volgograd',
    'Asia/Muscat' => '(GMT+04:00) Muscat',
    'Asia/Tbilisi' => '(GMT+04:00) Tbilisi',
    'Asia/Yerevan' => '(GMT+04:00) Yerevan',
    'Asia/Kabul' => '(GMT+04:30) Kabul',
    'Asia/Karachi' => '(GMT+05:00) Karachi',
    'Asia/Tashkent' => '(GMT+05:00) Tashkent',
    'Asia/Kolkata' => '(GMT+05:30) Kolkata',
    'Asia/Kathmandu' => '(GMT+05:45) Kathmandu',
    'Asia/Yekaterinburg' => '(GMT+06:00) Ekaterinburg',
    'Asia/Almaty' => '(GMT+06:00) Almaty',
    'Asia/Dhaka' => '(GMT+06:00) Dhaka',
    'Asia/Novosibirsk' => '(GMT+07:00) Novosibirsk',
    'Asia/Bangkok' => '(GMT+07:00) Bangkok',
    'Asia/Jakarta' => '(GMT+07:00) Jakarta',
    'Asia/Krasnoyarsk' => '(GMT+08:00) Krasnoyarsk',
    'Asia/Chongqing' => '(GMT+08:00) Chongqing',
    'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
    'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
    'Australia/Perth' => '(GMT+08:00) Perth',
    'Asia/Singapore' => '(GMT+08:00) Singapore',
    'Asia/Taipei' => '(GMT+08:00) Taipei',
    'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
    'Asia/Urumqi' => '(GMT+08:00) Urumqi',
    'Asia/Irkutsk' => '(GMT+09:00) Irkutsk',
    'Asia/Seoul' => '(GMT+09:00) Seoul',
    'Asia/Tokyo' => '(GMT+09:00) Tokyo',
    'Australia/Adelaide' => '(GMT+09:30) Adelaide',
    'Australia/Darwin' => '(GMT+09:30) Darwin',
    'Asia/Yakutsk' => '(GMT+10:00) Yakutsk',
    'Australia/Brisbane' => '(GMT+10:00) Brisbane',
    'Australia/Canberra' => '(GMT+10:00) Canberra',
    'Pacific/Guam' => '(GMT+10:00) Guam',
    'Australia/Hobart' => '(GMT+10:00) Hobart',
    'Australia/Melbourne' => '(GMT+10:00) Melbourne',
    'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
    'Australia/Sydney' => '(GMT+10:00) Sydney',
    'Asia/Vladivostok' => '(GMT+11:00) Vladivostok',
    'Asia/Magadan' => '(GMT+12:00) Magadan',
    'Pacific/Auckland' => '(GMT+12:00) Auckland',
    'Pacific/Fiji' => '(GMT+12:00) Fiji',
    ];

    $options = array_add($options, '', ' - - ' . __('mesydel.select') . ' - - ');

    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('selectFieldtranslated', function ($name, $options, $label = null, $value = null, $attributes = []) {
    // Translating each value $option
    foreach ($options as $id => $option) {
        $options[$id] = __('mesydel.' . $option);
    }
    //$options = array_sort_recursive($options);

    $options = array_add($options, '', ' - - ' . __('mesydel.select') . ' - - ');

    $element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});

Form::macro('selectMultipleField', function ($name, $options, $label = null, $value = null, $attributes = []) {
    $attributes = array_merge($attributes, [
    'multiple' => true,
    ]);
    $options = ['' => ''] + $options;
    $element = Form::select($name . '[]', $options, $value, fieldAttributes($name, $attributes));

    return fieldWrapper($name, $element, $label);
});


/*
 * Return the html to render an individual radio control
 *
 * @param string $name
 *          - name of the radio
 * @param string $displayName
 *          - display name of the radio
 * @param string $value
 *          - value of control if selected
 * @param string $checked
 *          - is the radio selected?
 * @param array $attributes
 *          - other attributes (class, id etc)
 * @return string - The html rendering of the radio control
 */
if (!function_exists('radio')) {
    function radio($name, $displayName, $value, $checked = null, $attributes = [])
    {
        $out = '';
        $attributes = array_merge([
        'id' => 'id-field-' . $name . '-' . $displayName,
        ], $attributes);
        $out .= '<label for="' . 'id-field-' . $name . '-' . $displayName . '" class="radio-inline">';
        $out .= Form::radio($name, $value, $checked, $attributes) . ' ' . $displayName;
        $out .= '</label>';

        return $out;
    }
}
/*
 * Return the html to render an individual checkbox control
 *
 * @param string $name
 *          - Name of the checkbox
 * @param string $displayName
 *          - Display name of the checkbox
 * @param string $value
 *          - Value if control is checked
 * @param string $checked
 *          - Is the checkbox checked by default
 * @param array $attributes
 *          - other attributes (class, id etc)
 * @return string - html rendering of the checkbox control. Note that
 *         it includes a hidden field. This simplifies form processing when checkbox is unchecked
 */
if (!function_exists('checkBox')) {
    function checkBox($name, $displayName, $value = 1, $checked = null, $attributes = [])
    {
        $out = '';
        $attributes = array_merge([
        'id' => 'id-field-' . $name,
        ], $attributes);
        $out .= '<label for="' . 'id-field-' . $name . '" class="checkbox-inline">';
        $out .= '<input type="hidden" name="' . $name . '" value="0" />'; // spl handling for checkbox that is not checked
        // $out .= Form::hidden($name, 0); //note that this does NOT work well!
        $out .= Form::checkbox($name, $value, $checked, $attributes) . ' ' . $displayName;
        $out .= '</label>';

        return $out;
    }
}
/*
 * Wrap an element with twitter bootstrap 3.0 specific code for proper rendering
 *
 * @param string $field
 *          - field name
 * @param string $element
 *          - html rendering of internal form element to be output
 * @param string $label
 *          - label that is displayed to the left
 * @return string - formatted html with all divs etc for final display on screen
 */
if (!function_exists('fieldWrapper')) {
    function fieldWrapper($field, $element, $label = null)
    {
        $out = '<div class="row">';
        $out .= '<div class="form-group';
        $out .= fieldError($field) . '">'; // set error class
        $out .= fieldLabel($field, $label); // gen label
        $out .= '<div class="col-lg-12">'; // 20150408 Remove class="col-lg-9"
        $out .= $element;
        $out .= errorMessage($field); // display error message
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';

        return $out;
    }
}
/*
 * return formatted error message associated with a field
 *
 * @param string $field
 *          - name of the field to be checked for errors
 * @return string - TBS 3.0 formatted span tag that is to be displayed alongside the field
 */
if (!function_exists('errorMessage')) {
    function errorMessage($field)
    {
        if ($errors = Session::get('errors')) {
            return '<span class="label label-danger">' . $errors->first($field) . '</span>';
        }
    }
}
/*
 * Return string 'has-error' that can be tagged to element div to signal erroneous entry
 *
 * @param string $field
 *          - the field name
 * @return string - 'has-error' in case the field has a validation error
 */
if (!function_exists('fieldError')) {
    function fieldError($field)
    {
        $error = '';
        if ($errors = Session::get('errors')) {
            $error = $errors->first($field) ? ' has-error' : '';
        }

        return $error;
    }
}
/*
 * html required for displaying the field label.
 * In case an explicit label is not passed,
 * generate one
 *
 * @param unknown $name
 *          - field name
 * @param unknown $label
 *          - label to be used
 * @return string - html for the label (TBS 3.0 formatted)
 */
if (!function_exists('fieldLabel')) {
    function fieldLabel($name, $label)
    {
        $out = '<label for="' . 'id-field-' . $name . '" class="control-label col-lg-12">';  // 20150408 Remove col-lg-3
        if ($label === null) {
            // remove _id, [].. replace _ and - with space.
            $out .= ucfirst(str_replace([
            '_',
            '-',
            ], ' ', str_replace([
              '_id',
              '[]',
              ], '', $name)));
        } else {
            $out .= $label;
        }
        $out .= '</label>';

        return $out;
    }
}
/*
 * helper function to add required classes (TBS 3.0) for "text input" fields
 *
 * @param string $name
 *          - field name
 * @param array $attributes
 *          - control attribs passed by user
 * @return array - attributes array merged with TBS specific classes
 */
if (!function_exists('fieldAttributes')) {
    function fieldAttributes($name, $attributes = [])
    {
        return array_merge([
        'class' => 'form-control',
        'id' => 'id-field-' . $name,
        ], $attributes);
    }
}
