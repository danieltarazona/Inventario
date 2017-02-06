<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El atributo :attribute debe ser aceptado.',
    'active_url'           => 'El atributo :attribute no es una URL valida.',
    'after'                => 'El atributo :attribute debe ser una fecha despues de :date.',
    'alpha'                => 'El atributo :attribute solo debe contener letras.',
    'alpha_dash'           => 'El atributo :attribute solo debe contener letras, numeros y guiones.',
    'alpha_num'            => 'El atributo :attribute solo puede contener letras y numeros.',
    'array'                => 'El atributo :attribute debe ser una matriz.',
    'before'               => 'El atributo :attribute debe ser una fecha antes de :date.',
    'between'              => [
        'numeric' => 'El atributo :attribute debe estar entre :min y :max.',
        'file'    => 'El atributo :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El atributo :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El atributo :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El atributo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El atributo :attribute de confirmacion no coincide.',
    'date'                 => 'El atributo :attribute no es una fecha valida.',
    'date_format'          => 'El atributo :attribute no concuerda con el formato :format.',
    'different'            => 'El atributo :attribute y :other deben ser diferentes.',
    'digits'               => 'El atributo :attribute deben ser :digits digitos.',
    'digits_between'       => 'El atributo :attribute debe estar entre :min and :max digits.',
    'dimensions'           => 'El atributo :attribute tiene dimensiones de imagen invalidas.',
    'distinct'             => 'El atributo :attribute tiene un valor duplicado.',
    'email'                => 'El atributo :attribute debe ser una direccion de email valida',
    'exists'               => 'El atributo :attribute selecionado es invalido.',
    'filled'               => 'El atributo :attribute es requerido.',
    'image'                => 'El atributo :attribute debe ser una imagen.',
    'in'                   => 'El atributo :attribute selecionado es invalido.',
    'in_array'             => 'El atributo :attribute no existe en :other.',
    'integer'              => 'El atributo :attribute debe ser un entero.',
    'ip'                   => 'El atributo :attribute debe tener una direccion IP valida.',
    'json'                 => 'El atributo :attribute debe ser tener un texto JSON valido.',
    'max'                  => [
        'numeric' => 'El atributo :attribute no puede ser mayor que :max.',
        'file'    => 'El atributo :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El atributo :attribute no puede ser mayor que :max characters.',
        'array'   => 'El atributo :attribute no puede tener mas de :max items.',
    ],
    'mimes'                => 'El atributo :attribute debe ser un archivo del tipo: :values.',
    'min'                  => [
        'numeric' => 'El atributo :attribute debe tener por lo menos :min.',
        'file'    => 'El atributo :attribute debe tener por lo menos :min kilobytes.',
        'string'  => 'El atributo :attribute debe tener por lo menos :min characters.',
        'array'   => 'El atributo :attribute debe tener por lo menos :min items.',
    ],
    'not_in'               => 'El selected atributo :attribute is invalid.',
    'numeric'              => 'El atributo :attribute must be a number.',
    'present'              => 'El atributo :attribute field must be present.',
    'regex'                => 'El atributo :attribute format is invalid.',
    'required'             => 'El atributo :attribute es requerido.',
    'required_if'          => 'El atributo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El atributo :attribute es requerido a menos que :other este en :values.',
    'required_with'        => 'El atributo :attribute es requerido cuando :values este presente.',
    'required_with_all'    => 'El atributo :attribute es requerido cuando tolos los :values esten presentes.',
    'required_without'     => 'El atributo :attribute es requerido cuando :values no este presente.',
    'required_without_all' => 'El atributo :attribute es requerido cuando ninguno de los :values esten presentes.',
    'same'                 => 'El atributo :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El atributo :attribute debe tener :size.',
        'file'    => 'El atributo :attribute debe tener :size kilobytes.',
        'string'  => 'El atributo :attribute debe tener :size caracteres.',
        'array'   => 'El atributo :attribute debe contener :size items.',
    ],
    'string'               => 'El atributo :attribute debe ser un texto.',
    'timezone'             => 'El atributo :attribute debe tener una zona horaria valida.',
    'unique'               => 'El atributo :attribute ya ha sido tomado. Intenta nuevamente.',
    'url'                  => 'El atributo :attribute debe ser una URL valida.',

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
    | El following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
