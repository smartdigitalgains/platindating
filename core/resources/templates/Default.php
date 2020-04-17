<?php
Namespace Core\Resources\Templates;


class DefaultTemplate{

    function __construct(){

        $this->externalCss = [
            "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",
        ];

        $this->internalCss = [
            "/assets/css/toast.min.css",
        ];

        $this->externalJs = [
            "https://code.jquery.com/jquery-3.4.1.slim.min.js",
            "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",
            "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",
        ];

        $this->internalJs = [
            "/assets/js/toast.min.js",
        ];


    }

}