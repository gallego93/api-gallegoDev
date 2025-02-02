<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Guardar los datos en la base de datos
        //Contact::create($validatedData);

        // Opcional: Enviar un correo con los datos del formulario
        Mail::send('emails.contact', $validatedData, function ($message) use ($validatedData) {
            $message->to('dsgallego@oaksoft.tech') // Cambiar por tu correo de administración
                ->subject('Nuevo mensaje de contacto: ' . $validatedData['subject']);
        });

        // Responder con un mensaje de éxito
        return response()->json(['message' => 'Mensaje enviado exitosamente'], 200);
    }
}
