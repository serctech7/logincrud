<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
	public function run()
	{
		$nombre = "Sergio";
		$apellido_p = "Fragoso";
		$email = "serfra@tecnm.com";
		$usuario = "admin";
		$password = password_hash("12345", PASSWORD_DEFAULT);
		$type = "admin";


		 $data = [
                        'nombre' => $nombre,
                        'apellido_p' => $apellido_p,
                        'email' => $email,
                        'usuario' => $usuario,
                        'password'    => $password,
                        'type' => $type
                ];

                // Using Query Builder
                $this->db->table('t_usuario')->insert($data);
	}
}