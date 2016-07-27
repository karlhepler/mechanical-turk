<?php

return [

    /**
     * AWS access key id
     */
    'accessKeyId' => env('AWS_KEY'),

    /**
     * AWS secret
     */
    'secretAccessKey' => env('AWS_SECRET'),

    /**
     * Determine whether or not to use the sandbox uri
     */
    'useSandbox' => true,
    
];
