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

    'accepted'             => 'El :attribute debe ser aceptado.',
    'active_url'           => 'El :attribute no es una URL valida.',
    'after'                => 'El :attribute debe ser una fecha despues de :date.',
    'alpha'                => 'El :attribute solo debe contener letras.',
    'alpha_dash'           => 'El :attribute solo debe contener letras, numeros y guiones.',
    'alpha_num'            => 'El :attribute solo puede contener letras y numeros.',
    'array'                => 'El :attribute debe ser una matriz.',
    'before'               => 'El :attribute debe ser una fecha antes de :date.',
    'between'              => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file'    => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El :attribute de confirmacion no coincide.',
    'date'                 => 'El :attribute no es una fecha valida.',
    'date_format'          => 'El :attribute no concuerda con el formato :format.',
    'different'            => 'El :attribute y :other deben ser diferentes.',
    'digits'               => 'El :attribute deben ser :digits digitos.',
    'digits_between'       => 'El :attribute debe estar entre :min and :max digits.',
    'dimensions'           => 'El :attribute tiene dimensiones de imagen invalidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El :attribute debe ser una direccion de email valida',
    'exists'               => 'El :attribute selecionado es invalido.',
    'filled'               => 'El campo :attribute es requerido.',
    'image'                => 'El :attribute debe ser una imagen.',
    'in'                   => 'El :attribute selecionado es invalido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El :attribute debe ser un entero.',
    'ip'                   => 'El :attribute debe tener una direccion IP valida.',
    'json'                 => 'El :attribute debe ser tener un texto JSON valido.',
    'max'                  => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file'    => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El :attribute no puede ser mayor que :max characters.',
        'array'   => 'El :attribute no puede tener mas de :max items.',
    ],
    'mimes'                => 'El :attribute debe ser un archivo del tipo: :values.',
    'min'                  => [
        'numeric' => 'El :attribute debe tener por lo menos :min.',
        'file'    => 'El :attribute debe tener por lo menos :min kilobytes.',
        'string'  => 'El :attribute debe tener por lo menos :min characters.',
        'array'   => 'El :attribute debe tener por lo menos :min items.',
    ],
    'not_in'               => 'El selected :attribute is invalid.',
    'numeric'              => 'El :attribute must be a number.',
    'present'              => 'El :attribute field must be present.',
    'regex'                => 'El :attribute format is invalid.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other este en :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values este presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando tolos los :values esten presentes.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no este presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los :values esten presentes.',
    'same'                 => 'El :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El :attribute debe tener :size.',
        'file'    => 'El :attribute debe tener :size kilobytes.',
        'string'  => 'El :attribute debe tener :size caracteres.',
        'array'   => 'El :attribute debe contener :size items.',
    ],
    'string'               => 'El :attribute debe ser un texto.',
    'timezone'             => 'El :attribute debe tener una zona horaria valida.',
    'unique'               => 'El :attribute ya ha sido tomado. Intenta nuevamente.',
    'url'                  => 'El :attribute debe ser una URL valida.',

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
