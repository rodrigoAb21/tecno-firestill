<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        /*************************************************************
         *                       TRABAJADORES
         ************************************************************/
        DB::table('trabajador')->insert([
            'nombre' => 'Rodrigo',
            'apellido' => 'Abasto',
            'carnet' => 'carnet',
            'edad' => 28,
            'telefono' => '3532021',
            'direccion' => 'direccion',
            'tipo' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'carnet' => '7894562',
            'edad' => 18,
            'telefono' =>  '79864512',
            'direccion' => 'Av. Paraguá # 82 ',
            'tipo' => 'Tecnico',
            'email' => 'juanp@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Jose',
            'apellido' => 'Menacho',
            'carnet' => '7456458',
            'edad' => 14,
            'telefono' =>  '75698124',
            'direccion' => 'Av. Uruguay # 11',
            'tipo' => 'Venta',
            'email' => 'josem@gmail.com',
            'password' => bcrypt('rodrigo'),
        ])

        ;/*************************************************************
         *                       config
         ************************************************************/

        DB::table('config')->insert([
            'theme' => 'dark',
            'sidebar' => 'light',
            'topbar' => 'dark',
            'font' => 'default',
            'font_size' => 'default',
            'trabajador_id' => 1
        ]);
        DB::table('config')->insert([
            'theme' => 'dark',
            'sidebar' => 'brand',
            'topbar' => 'dark',
            'font' => 'default',
            'font_size' => '20',
            'trabajador_id' => 2
        ]);
        DB::table('config')->insert([
            'theme' => 'dark',
            'sidebar' => 'gradient',
            'topbar' => 'dark',
            'font' => 'default',
            'font_size' => '20',
            'trabajador_id' => 3
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
            'foto' => 'manguera-extintor.jpg',
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
            'foto' => '1545101362.jpg',
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
            'foto' => 'm2.png',
            'descripcion' => 'Manguera para descarga de extintores portátiles' .
                ' de polvo químico seco, su diámetro interior uniforme ' .
                'favorece la descarga del agente.',
            'precio' => '110',
            'cantidad' => '0',
            'categoria_id' => 2,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Americano 400PSI',
            'foto' => 'manometrop.jpg',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '60',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro Argentino 2MPa',
            'foto' => 'manometro_espanol.jpg',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '45',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);

        DB::table('producto')->insert([
            'nombre' => 'Manometro 27Bar',
            'foto' => 'ManometroBar.jpg',
            'descripcion' => 'Manometro para extintor.',
            'precio' => '50',
            'cantidad' => '0',
            'categoria_id' => 3,
        ]);


        /*************************************************************
         *                        CONTADOR
         ************************************************************/


        DB::table('contador')->insert([
            'caso_uso' => 'trabajadores',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'trabajadores',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'trabajadores',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'trabajadores',
            'accion' => 'ver',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'proveedores',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'proveedores',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'proveedores',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'proveedores',
            'accion' => 'ver',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'clientes',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'clientes',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'clientes',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'clientes',
            'accion' => 'ver',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'categorias',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'categorias',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'categorias',
            'accion' => 'editar',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'tipos',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'tipos',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'tipos',
            'accion' => 'editar',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'marcas',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'marcas',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'marcas',
            'accion' => 'editar',
            'contador' => 0
        ]);




        DB::table('contador')->insert([
            'caso_uso' => 'productos',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'productos',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'productos',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'productos',
            'accion' => 'ver',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'productos',
            'accion' => 'baja',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'ingresos',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'ingresos',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'ingresos',
            'accion' => 'ver',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'bajas',
            'accion' => 'index',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'ventas',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'ventas',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'ventas',
            'accion' => 'ver',
            'contador' => 0
        ]);




        DB::table('contador')->insert([
            'caso_uso' => 'servicios',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'servicios',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'servicios',
            'accion' => 'ver',
            'contador' => 0
        ]);




        DB::table('contador')->insert([
            'caso_uso' => 'contratos',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'contratos',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'contratos',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'contratos',
            'accion' => 'ver',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'sucursales',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'sucursales',
            'accion' => 'ver',
            'contador' => 0
        ]);



        DB::table('contador')->insert([
            'caso_uso' => 'equipos',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'equipos',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'equipos',
            'accion' => 'ver',
            'contador' => 0
        ]);




        DB::table('contador')->insert([
            'caso_uso' => 'fichas',
            'accion' => 'index',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'fichas',
            'accion' => 'registrar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'fichas',
            'accion' => 'editar',
            'contador' => 0
        ]);
        DB::table('contador')->insert([
            'caso_uso' => 'fichas',
            'accion' => 'ver',
            'contador' => 0
        ]);

    }
}
