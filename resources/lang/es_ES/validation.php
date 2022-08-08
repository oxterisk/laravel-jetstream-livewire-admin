<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute debe ser aceptado.',
    'accepted_if' => ':attribute debe ser aceptado cuando :other es :value.',
    'active_url' => ':attribute no es una URL válida.',
    'after' => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => ':attribute debe contener solo ciertas letras.',
    'alpha_dash' => ':attribute debe contener solo letras, números, guiones y guiones bajos.',
    'alpha_num' => ':attribute debe contener solo letras y números.',
    'array' => ':attribute debe ser un array.',
    'before' => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => ':attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => ':attribute debe estar entre :min y :max.',
        'file' => ':attribute debe ser entre :min y :max kilobytes.',
        'string' => ':attribute debe contener entre :min y :max caracteres.',
        'array' => ':attribute debe contener entre :min y :max ítems.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'El :attribute de confirmación no coincide.',
    'current_password' => 'La contraseña no coincide.',
    'date' => ':attribute no es una fecha válida.',
    'date_equals' => ':attribute debe ser una fecha igual a :date.',
    'date_format' => ':attribute no coincide con el formato :format.',
    'declined' => ':attribute debe ser rechazado.',
    'declined_if' => ':attribute debe ser rechazado cuando :other es :value.',
    'different' => ':attribute y :other deben ser diferentes.',
    'digits' => ':attribute debe tener :digits dígitos.',
    'digits_between' => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions' => ':attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute contiene un valor duplicado.',
    'email' => ':attribute debe ser una dirección de email válida.',
    'ends_with' => ':attribute debe finalizar con uno de los siguientes valores: :values.',
    'enum' => 'El campo :attribute seleccionado no es válido.',
    'exists' => 'El campo :attribute seleccionado no es válido.',
    'file' => ':attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe contener un valor.',
    'gt' => [
        'numeric' => ':attribute debe ser mayor que :value.',
        'file' => ':attribute debe ser mayor de :value kilobytes.',
        'string' => ':attribute debe contener más de :value caracteres.',
        'array' => ':attribute debe contener más de :value ítems.',
    ],
    'gte' => [
        'numeric' => ':attribute debe ser mayor o igual que :value.',
        'file' => ':attribute debe ser mayor o igual de :value kilobytes.',
        'string' => ':attribute debe contener :value caracteres o más.',
        'array' => ':attribute debe contener :value ítems o más.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => 'El campo :attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => ':attribute debe ser un entero.',
    'ip' => ':attribute debe ser una dirección IP válida.',
    'ipv4' => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6' => ':attribute debe ser una dirección IPv6 válida.',
    'json' => ':attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => ':attribute debe ser menor que :value.',
        'file' => ':attribute debe ser menor de :value kilobytes.',
        'string' => ':attribute debe contener menos de :value caracteres.',
        'array' => ':attribute debe contener menos de :value ítems.',
    ],
    'lte' => [
        'numeric' => ':attribute debe ser menor o igual a :value.',
        'file' => ':attribute debe ser menor o igual a :value kilobytes.',
        'string' => ':attribute debe contener :value caracteres o menos.',
        'array' => ':attribute no debe contener más de :value ítems.',
    ],
    'mac_address' => ':attribute debe ser una dirección MAC válida.',
    'max' => [
        'numeric' => ':attribute no debe ser mayor que :max.',
        'file' => ':attribute no debe ser mayor de :max kilobytes.',
        'string' => ':attribute no debe contener más de :max caracteres.',
        'array' => ':attribute no debe tener más de :max ítems.',
    ],
    'mimes' => ':attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => ':attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => ':attribute debe ser como mínimo :min.',
        'file' => ':attribute debe ser como mínimo de :min kilobytes.',
        'string' => ':attribute debe contener como mínimo :min caracteres.',
        'array' => ':attribute debe contener como mínimo :min ítems.',
    ],
    'multiple_of' => ':attribute debe ser múltiplo de :value.',
    'not_in' => 'El campo :attribute seleccionado no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => ':attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a no ser que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohibe que :other esté presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a no ser que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values está presente.',
    'same' => ':attribute y :other deben coincidir.',
    'size' => [
        'numeric' => ':attribute debe ser :size.',
        'file' => ':attribute ser de :size kilobytes.',
        'string' => ':attribute debe ser de :size caracteres.',
        'array' => ':attribute debe contener :size ítems.',
    ],
    'starts_with' => ':attribute debe comenzar con uno de los siguientes: :values.',
    'string' => ':attribute debe ser una cadena.',
    'timezone' => ':attribute debe ser una zona horária válida.',
    'unique' => ':attribute ya ha sido usado.',
    'uploaded' => ':attribute no se pudo subir.',
    'url' => ':attribute debe ser una URL válida.',
    'uuid' => ':attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
