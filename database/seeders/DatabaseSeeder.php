<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*************************************************************
         *                       EMPLEADOS
         ************************************************************/

        DB::table('trabajador')->insert([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'carnet' => '7894562',
            'telefono' =>  '79864512',
            'direccion' => 'Av. Paraguá # 82 ',
            'tipo' => 'Administrador',
            'email' => 'juanp@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Jose',
            'apellido' => 'Menacho',
            'carnet' => '7456458',
            'telefono' =>  '75698124',
            'direccion' => 'Av. Uruguay # 11',
            'tipo' => 'Administrador',
            'email' => 'josem@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Francisco',
            'apellido' => 'Becerra',
            'carnet' => '8485265',
            'telefono' =>  '76054896',
            'direccion' => 'Av. Busch #785',
            'tipo' => 'Administrador',
            'email' => 'franciscob@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Manuel',
            'apellido' => 'Mercado',
            'carnet' => '8586954',
            'telefono' =>  '75489362',
            'direccion' => 'Av. Mutualista #45',
            'tipo' => 'Administrador',
            'email' => 'manuelm@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Marta',
            'apellido' => 'Lopez',
            'carnet' => '8798456',
            'telefono' =>  '79844028',
            'direccion' => 'Av. Melchor Pinto #12',
            'tipo' => 'Administrador',
            'email' => 'martal@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);


        /*************************************************************
         *                       CLIENTES
         ************************************************************/

        DB::table('cliente')->insert([
            'nombre_empresa' => 'Petrobras',
            'nit' =>  '10023145654',
            'email' => 'marcospbolivia@petrobras.com',
            'telefono_empresa' => '3667000',
            'direccion' => 'Avenida Leigue Castedo No. 1700',
            'nombre_encargado' => 'Marcos Pereira',
            'cargo_encargado' => 'Encargado de Seguridad',
            'telefono_encargado' => '73145562',
        ]);

        DB::table('cliente')->insert([
            'nombre_empresa' => 'Banco BNB',
            'nit' =>  '10045578962',
            'email' => 'josea@bnb.com',
            'telefono_empresa' => '33662777',
            'direccion' => 'Calle René Moreno N° 258, Zona Central',
            'nombre_encargado' => 'José Antelo',
            'cargo_encargado' => 'Encargado de Seguridad',
            'telefono_encargado' => '74589321',
        ]);

        DB::table('cliente')->insert([
            'nombre_empresa' => 'Herramundo',
            'nit' =>  '1002564568',
            'email' => 'herramundo@gmail.com',
            'telefono_empresa' => '33477988',
            'direccion' => 'Av. Paraguá # 82 entre Segundo y, 3er Anillo Interno',
            'nombre_encargado' => 'Edmundo Soto',
            'cargo_encargado' => 'Encargado de Seguridad',
            'telefono_encargado' => '72256893',
        ]);



        /*************************************************************
         *                       PROVEEDORES
         ************************************************************/

        DB::table('proveedor')->insert([
            'nombre' => 'FERROTODO',
            'nit' =>  '1028373024',
            'email' => 'ferrotodo@gmail.com',
            'telefono' => '3711138',
            'direccion' => '3er. Anillo interno entre Av. Alemana y Av. Mutualista 352',
            'informacion' => 'Fabricación de Tubos, perfile, estribos, ' .
                'mallas etectrosoldadas, alambres, clavos, trenzas para hormigon.',
            'titular' => 'FERROTODO LTA',
            'banco' => 'Banco Union',
            'sucursal' => 'Santa Cruz',
            'nro_cuenta' => '130453934',
            'moneda' => 'Boliviano',
            'tipo_identificacion' => 'NIT',
            'nro_identificacion' => '1028373024',
        ]);


        DB::table('proveedor')->insert([
            'nombre' => 'Emaser Anglarill',
            'nit' =>  '184786023',
            'email' => 'jc.anglarill.cia@gmail.com',
            'telefono' => '33548369',
            'direccion' => 'Av. Esmeralda Nº 151 entre Av.Doble Via a la Guardia',
            'informacion' => 'Proveedor de repuestos industriales.',
            'titular' => 'Erlan Anglarill A.',
            'banco' => 'Banco BCP',
            'sucursal' => 'Santa Cruz',
            'nro_cuenta' => '13054829',
            'moneda' => 'Boliviano',
            'tipo_identificacion' => 'NIT',
            'nro_identificacion' => '184786023',
        ]);


        DB::table('proveedor')->insert([
            'nombre' => 'AGSA',
            'nit' =>  '1023281020',
            'email' => 'herramundo@gmail.com',
            'telefono' => '3322021',
            'direccion' => 'Av. Cañoto #167',
            'informacion' => 'Agencias Generales, distribuidor de maquinaria.',
            'titular' => 'AGSA',
            'banco' => 'Banco Union',
            'sucursal' => 'Santa Cruz',
            'nro_cuenta' => '1172256893',
            'moneda' => 'Boliviano',
            'tipo_identificacion' => 'NIT',
            'nro_identificacion' => '1023281020',
        ]);


        /*************************************************************
         *                      CATEGORIAS
         ************************************************************/

        DB::table('categoria')->insert([
            'nombre' => 'Cilindros',
        ]);
        DB::table('categoria')->insert([
            'nombre' => 'Mangueras',
        ]);
        DB::table('categoria')->insert([
            'nombre' => 'Manometros',
        ]);
        DB::table('categoria')->insert([
            'nombre' => 'Alarmas',
        ]);
        DB::table('categoria')->insert([
            'nombre' => 'Boquillas',
        ]);
        DB::table('categoria')->insert([
            'nombre' => 'Válvulas',
        ]);

        /*************************************************************
         *                TIPO CLASIFICACION
         ************************************************************/

        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'CO2',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Polvo pretenzado A.B.C.',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Agua',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Polvo',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Espuma Química',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Polvo pres. DC',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'AFFF',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Nomex',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Agua vapor AC',
        ]);


        /*************************************************************
         *                    MARCAS CLASIFICACION
         ************************************************************/

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Imex',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Yukan',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Tecin',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Luda',
        ]);


        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Matha',
        ]);


        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Melisam',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Galini',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Orango',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Norbao',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Berbini',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Fedeca',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Bertezo',
        ]);



        /*************************************************************
         *                        PRODUCTO
         ************************************************************/

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);DB::table('producto')->insert([
        'nombre' => 'Mangueras extintor Polvo/Espuma',
        'origen' => 'China',
        'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
            'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
            ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
            ' >400mm( a partir de 3kg/3lts)',
        'precio' => '80',
        'cantidad' => '0',
        'categoria_id' => 2,
    ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor Polvo/Espuma',
            'origen' => 'China',
            'descripcion' => 'Conexión a la manguera: rosca macho métrica ' .
                'M-14 x 1,25 Presión de rotura: ≥60 bars (3 veces la presión' .
                ' de servicio P(Tmáx:17bar)) Longitud de la manguera:' .
                ' >400mm( a partir de 3kg/3lts)',
            'precio' => '80',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras extintor CO2',
            'origen' => 'China',
            'descripcion' => 'Para el modelo de 2kg se puede utilizar' .
                ' boquilla difusora o manguera corta de PVC. Para el modelo' .
                ' de 5kg de CO2 la manguera seria fabricada en caucho ' .
                'reforzado con difusor de bocina tipo pico-pato.',
            'precio' => '90',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Mangueras para Extintores de PQS',
            'origen' => 'China',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'origen' => 'China',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);
    }
}
