<?php

namespace App\Http\Controllers;

use Brazanation\Documents\Cnh;
use Brazanation\Documents\Cpf;
use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    public function cpf(Request $request)
    {
        $document = Cpf::createFromString( $request->cpf );

        if (false === $document) {
            return response()->json([
                'status' => 'Not Valid'
            ], 200);
        }

        return response()->json([
            'status' => 'Valid',
            'cpf'    => $document->format()
        ], 200);
    }

    public function cnh(Request $request)
    {
        $document = Cnh::createFromString( $request->cnh );

        if (false === $document) {
            return response()->json([
                'status' => 'Not Valid'
            ], 200);
        }

        return response()->json([
            'status' => 'Valid',
            'cnh'    => $document->format()
        ], 200);
    }
}
