<?php

return [
  'tags' => [
    [
      'name' => 'data_object',
      'format' => 'string',
      'default_description' => 'Default desc of data_object.',
    ],
    [
      'name' => 'data_subject',
      'format' => 'string',
      'default_description' => "default",
  ],
  [
      'name' => 'purpose',
      'format' => 'string',
      'default_description' => "default",
    ],
    [
      'name' => 'data_operator',
      'format' => 'string',
      'default_description' => "default",
    ],
  [
      'name' => 'data_recipient',
      'format' => 'string',
      'default_description' => "default",
    ],
  [
      'name' => 'data_controller',
      'format' => 'string',
      'default_description' => "default",
  ],
  [
      'name' => 'data_processor',
      'format' => 'string',
      'default_description' => "default",
  ]
  ],
  'lawful_purposes' => [
    "consent" => "If the data subject has given consent to the processing of his or her personal data;",
    "performance_of_a_contract" => "To fulfil contractual obligations with a data subject, or for tasks at the request of a data subject who is in the process of entering into a contract;",
    "legal_requirement" => "To comply with a data controller's legal obligations;",
    "vital_interest" => "To protect the vital interests of a data subject or another individual;",
    "public_interest" => "To perform a task in the public interest or in official authority;",
    "legitimate_interest" => "For the legitimate interests of a data controller or a third party, unless these interests are overridden by interests of the data subject or her or his rights according to the Charter of Fundamental Rights (especially in the case of children)"
  ],
  'legal_basis_url' => "https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:32016R0679",
  'git_source_code' => 'https://github.com/openjusticebe/OJDataProtect',
  'license_url' => 'https://github.com/openjusticebe/OJDataProtect/blob/main/LICENSE',
  'colors' => [
    'data_object' => '#db2777',
    'data_subject' => '#d97706',
    'data_recipient' => '#6574cd',
    'purpose' => '#059669',
    'data_processor' => '#e3342f',
    'data_controller' => '#f66d9b',
    'data_operator' => '#6574cd',
  ],
];
