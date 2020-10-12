<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
 
    */

    'accepted'             => 'O :attribute deve ser válido.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute deve ser uma data após :date.',
    'after_or_equal'       => 'O :attribute deve ser uma data após ou igual a :date.',
    'alpha'                => 'O :attribute pode conter apenas letras.',
    'alpha_dash'           => 'O :attribute pode conter apenas letras, numeros, e _.',
    'alpha_num'            => 'O :attribute só pode conter letras e números.',
    'array'                => 'O :attribute deve ser uma matriz.',
    'before'               => 'O :attribute deve ser uma data anterior a :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file'    => 'O :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'O :attribute deve estar entre :min e :max itens.',
    ],
    'boolean'              => 'O :attribute campo deve ser verdadeiro ou falso.',
    'confirmed'            => 'O :attribute confirmação não corresponde.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não corresponde ao formato :format.',
    'different'            => 'O :attribute e :other deve ser diferente.',
    'digits'               => 'O :attribute deve ter :digits digitos.',
    'digits_between'       => 'O :attribute deve estar entre :min e :max digits.',
    'dimensions'           => 'O :attribute não tem as dimensões válidas.',
    'distinct'             => 'O :attribute campo tem um valor duplicado.',
    'email'                => 'O :attribute deve ser um endereço de e-mail válido.',
    'exists'               => 'O campo :attribute é inválido.',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O :attribute campo deve ter um valor.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O campo :attribute é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço de IP válido.',
    'ipv4'                 => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O :attribute deve ser um JSON válido.',
    'max'                  => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file'    => 'O :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O :attribute não pode ser maior que :max cacacteres.',
        'array'   => 'O :attribute não pode ter mais que :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'file'    => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ter pelo menos :min caracteres.',
        'array'   => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é invalido.',
    'numeric'              => 'O :attribute deve ser numérico.',
    'present'              => 'O campo :attribute deve ser informado.',
    'regex'                => 'O formato :attribute é inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other is :value.',
    'required_unless'      => 'O campo :attribute é obrigatório a não ser que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente..',
    'required_without_all' => 'O campo :attribute é obrigatório quando none of :values está presente..',
    'same'                 => 'O campo :attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => 'O :attribute deve ser :size.',
        'file'    => 'O :attribute deve ser :size kilobytes.',
        'string'  => 'O :attribute deve ser :size characters.',
        'array'   => 'O :attribute must contain :size items.',
    ],
    'string'               => 'O campo :attribute deve ser a caracter.',
    'timezone'             => 'O campo :attribute deve ser data.',
    'unique'               => 'O campo :attribute ja foi informado.',
    'uploaded'             => 'Falha no carregamento :attribute.',
    'url'                  => 'O o formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
  
    */

    'user' => [
        'replacement_user_id' => [
            'required' => 'Selecione uma opção.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
   
    */

    'attributes' => [],

];
