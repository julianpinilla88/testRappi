    <?php

    class CubeSummationController extends CI_Controller
    {

        var $respError;

        function __construct()

        {
            parent::__construct();
           $this->load->helper('url');
        }


        public function index()    {
            $this->load->view('index.php');
        }


        public function addCubeSummation()
        {

            $this->load->view('addCubeSummation.php');
        }

        public function errores()
        {
           $error =  $this->respError;
            $this->load->view('errores.php', $error);
        }


        public function save()
        {
            $arrReturn = [];
            $arrResponse = [];
            $i = 0;

            $matriz = ($this->input->post('matriz'));
            $matriz = nl2br($matriz);
            $matriz_cube = explode("<br />", $matriz);

            foreach ($matriz_cube as $filas) {
                $arrVar = explode(' ', trim($filas));

                if (sizeof($arrVar) == 1) {
                    if (!is_numeric($arrVar[0]) OR ($arrVar[0] < 1 OR $arrVar[0] > 50)) {
                        $this->respError = "el n&uacute;mero de casos debe ser: 1 <= T <= 50 ";
                        $this->errores();

                    } else {
                        $arrReturn = [];
                        $arrReturn['t'] = $arrVar[0];

                    }
                }elseif(sizeof($arrVar) == 2){
                    if (!is_numeric($arrVar[0]) OR ($arrVar[0] < 1 OR $arrVar[0] > 100)) {
                        $this->respError = "La Matriz debe ser: 1 <= N <= 100  ";
                        $this->errores();
                    } else {
                        $arrReturn['n'] = $arrVar[0];
                    }
                    if (!is_numeric($arrVar[1]) OR ($arrVar[1] < 1 OR $arrVar[1] > 1000)) {
                        $this->respError = "el n&uacute;mero de ejecuciones debe ser: 1 <= M <= 1000  ";
                        $this->errores();
                    } else {
                        $arrReturn['m'] = $arrVar[1];
                    }
                    $arrReturn['matriz'] = [];
                }elseif($arrVar[0] == 'UPDATE') {
                    $arrReturn = $this->update($arrVar,  $arrReturn);

                }elseif($arrVar[0] == 'QUERY'){

                    $arrResponse['QUERY'] [] = $this->query($arrVar,  $arrReturn);
                }

            }

            if(count($arrResponse) AND empty($this->respError)) {
                $this->load->view('result.php', $arrResponse);
            }
        }


        public function update($arrVar,  $arrReturn)
        {


            if (sizeof($arrVar) <> 5) {
                ECHO("<br> El campo UPDATE debe ser de  5 posiciones");
                 $this->respError = "El campo UPDATE debe ser de  5 posiciones  ";
                $this->errores();
            }elseif (!is_numeric($arrVar[1]) OR !is_numeric($arrVar[2]) OR !is_numeric ($arrVar[3]) OR !is_numeric($arrVar[4])){
                $this->respError = "Las posiciones deben  ser numericas  ";
                $this->errores();
            }elseif ($arrVar[1] < 1 OR $arrVar[2] < 1 OR $arrVar[3] < 1
                OR $arrVar[1] > $arrReturn['n'] OR $arrVar[2] > $arrReturn['n']
                OR $arrVar[3] > $arrReturn['n']){
                $this->respError = "1 <= x,y,z <= N  ";
                $this->errores();
            }elseif ($arrVar[4] < pow(-10, 9) OR $arrVar[4] > pow(10, 9)){
                $this->respError = "-109 <= W <= 109 ";
                $this->errores();
            }

            $arrReturn['matriz'][$arrVar[1]][$arrVar[2]][$arrVar[3]] = $arrVar[4];
            return $arrReturn;

        }

        public function query($arrVar, $arrReturn)
        {
            if (sizeof($arrVar) <> 7) {
                ECHO("<br> El campo QUERY debe ser de  7 posiciones");
                $this->respError = "El campo QUERY debe ser de  7 posiciones  ";
                $this->errores();
            } elseif (!is_numeric($arrVar[1]) OR !is_numeric($arrVar[2]) OR !is_numeric($arrVar[3]) OR !is_numeric($arrVar[4])
                OR !is_numeric($arrVar[5]) OR !is_numeric($arrVar[6])) {
                $this->respError = "Las posiciones QUERY deben  ser numericas  ";
                $this->errores();

            } elseif ($arrVar[1] > $arrVar[4] OR $arrVar[1] < 1 OR $arrVar[1] > $arrReturn['n']
                OR $arrVar[4] < 1 OR $arrVar[4] > $arrReturn['n']) {

                $this->respError = "1 <= x,y,z <= N  ";
                $this->errores();
            } elseif ($arrVar[2] > $arrVar[5] OR $arrVar[2] < 1 OR $arrVar[2] > $arrReturn['n']
                OR $arrVar[5] < 1 OR $arrVar[5] > $arrReturn['n']
            ) {

                $this->respError = "1 <= x,y,z <= N  ";
                $this->load->view('Errores.php', $this->respError);
            } elseif ($arrVar[3] > $arrVar[6] OR $arrVar[3] < 1 OR $arrVar[3] > $arrReturn['n']
                OR $arrVar[6] < 1 OR $arrVar[6] > $arrReturn['n']
            ) {

                $this->respError = "1 <= x,y,z <= N  ";
                $this->errores();
            }

            $suma = 0;
            for ($x = $arrVar[1]; $x <= $arrVar[4]; $x++) {
                for ($y = $arrVar[2]; $y <= $arrVar[5]; $y++) {
                    for ($z = $arrVar[3]; $z <= $arrVar[6]; $z++) {
                            $suma += ((isset($arrReturn['matriz'][$x][$y][$z])) ? $arrReturn['matriz'][$x][$y][$z] : 0);
                    }
                }
            }

            return $suma;
        }
    }

    ?>