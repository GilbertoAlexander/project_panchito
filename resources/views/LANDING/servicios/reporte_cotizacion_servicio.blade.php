<html>
    <head>
        <style>
            @page {
                 margin: 0cm 0cm;
            }

            @font-face {
                font-family: 'Oleo Script Swash Caps';
                font-style: cursive;
                font-weight: 100;
                src: local('Oleo Script Swash Caps'), local('Oleo Script Swash Caps'), url(https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap) format('truetype');
            }

            body{
                font-family: Cairo, sans-serif !important;
                background-image: url({{ public_path('images/bgproductovendedor.png') }});
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-attachment: fixed;
                /* margin-top: 1.5cm;
                margin-left: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 1.5cm; */
            }

            .content{
                margin-top: 1.5cm;
                margin-left: 0.4cm;
                margin-right: 0.4cm;
                margin-bottom: 0.8cm;
            }

            header {
                background-image: url(images/cabecera_panchito.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                position: fixed; 
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3.5cm;
            }

            footer {
                background-image: url(images/pie_panchito.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 3.9cm;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            
        </header>

        <footer>
            {{-- Copyright &copy; <?php echo date("Y");?>  --}}
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <p style="page-break-after: always;">
                Content Page 1
            </p>
            <p style="page-break-after: never;">
                Content Page 2
            </p>
        </main>
    </body>
</html>