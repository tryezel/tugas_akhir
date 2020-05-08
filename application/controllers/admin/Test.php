<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Test extends MY_Controller
    {
        function __construct(){
            parent::__construct();    
            $this->load->model('Laporan_model');
        }

        function index()
        {
            # nggon gae filter berdasarkan bulan misal d function blabla($posisi, $bulan)
            # dibusek wae
            #  | | | | | | | |
            # v v v v v v v v            
            $bulan = "05"; 
            $posisi = "2" ;
            ###################################################################
            $data =  $this->Laporan_model->ambil_data($posisi, $bulan);
            $databobot =  $this->Laporan_model->ambil_bobot($posisi, $bulan);
            $sumbobot =  $this->Laporan_model->sum_bobot($posisi, $bulan);
            $datamenu = $this->Laporan_model->data_menu($posisi, $bulan);
            $titik = $this->Laporan_model->jumlah_titik($posisi, $bulan);
            $id_pemain = $this->Laporan_model->id_pemain($posisi, $bulan);
            ###################################################################
            echo "<pre>";
            #########################################################
            foreach ($data as $key) {
                # ngelebok no data nang array
                $datamasukan = array('id_data' => $key->id_data,
                'id_pemain' => $key->id_pemain, 
                'point' => $key->point
            );
            #########################################################
            print_r($datamasukan);
            }
            echo "\n";
            echo "DATA MAX\n\n";
            ####################################################################
            $datamax = array(); # gae array data max
            foreach ($datamenu as $key) {   
                $id_menu = $key->id_menu;

                echo "<pre>";

                array_push($datamax,$this->Laporan_model->max($id_menu, $bulan));  #gae golek data max per titik terus di push nak array datamax
                
                echo "</pre>";
            }
            ######################################################################
            print_r($datamax);
            echo "\n";
            echo "DATA MIN\n\n";
            #################################################################
            $datamin = array();
            foreach ($datamenu as $key) {
                $id_menu = $key->id_menu;

                echo "<pre>";

                array_push($datamin,$this->Laporan_model->min($id_menu, $bulan));   #gae golek data min per titik terus di push nak array datamin
                
                echo "</pre>";
            
            }
            #####################################################################
            print_r($datamin);
            echo "\n";
            // print_r($datamax);
            print_r($datamin);
            echo "\n";
            print_r($sumbobot);
            echo "\n";
            echo "data bobot\n";
            ######################################################################
            $normalisasi = []; #gae array normalisasi
            foreach ($databobot as $key) {
                # code...
                $nilai = array(
                    'id_titik'=>$key->id_titik,
                    'bobot' => $key->bobot, 
                    'normalisasi' => $key->bobot/$sumbobot[0]['sum_bobot']  #perhitungan golek normalisasine langsung d jero array nilai
                );
                array_push($normalisasi, $nilai); #gae ngepush array nilai nak njero array normalisasi
            }
            #######################################################################
            print_r($normalisasi);
            echo "jumlah titik : ";
            print_r($titik);
            echo "nilai utility\n\n";
            ##########################################################################################################################################################
            $nu = []; #gae array nilai utility
            foreach ($data as $key) {
                for ($i=0; $i < $titik[0]['jumlah_titik']; $i++) { 
                    if ($key->id_menu == $datamax[$i][0]['id_menu']) {
                        $nilai_utility = array(
                            'id_pemain'=> $key->id_pemain,
                            'id_menu' => $key->id_menu,
                            'point' => $key->point,
                            'hasil_utility' => $hu =($key->point - $datamin[$i][0]['pointmin']) / ($datamax[$i][0]['pointmax'] - $datamin[$i][0]['pointmin']) #perhitungan gae golek nilai utility per titik
                        );
                        array_push($nu, $nilai_utility); #gae ngepush pisan  
                    }
                }
            }
            #############################################################################
            print_r($nu);
            echo "\n\n";
            echo "NILAI AKHIR\n\n";
            #################################################################################
            $hasil_akhir = []; #gae array
            foreach ($id_pemain as $ip) {
                $hasila = 0;    #inisialisasi                          
                foreach ($normalisasi as $n) {
                    foreach ($nu as $ha) {
                        if ($ip->id_pemain == $ha['id_pemain']) {
                            if ($n['id_titik'] == $ha['id_menu']) {
                                $akhir = array(
                                    'id_pemain' => $ip->id_pemain
                                );     
                                if($ha['id_pemain'] == $akhir['id_pemain']){
                                    $hasil = $ha['hasil_utility']*$n['normalisasi']; # gae ngitung hasil pertitik penjelasane dek echo ngisore iki
                                
                                    echo "id_pemain -> (titik) hasil utility X (titik) normalisasi";
                                    echo "\n ".$ha['id_pemain']."-> "."(".$ha['id_menu'] .")".$ha['hasil_utility']." X (".$n['id_titik'].")".$n['normalisasi'] ." = ". $hasil."\n\n";
                                
                                }
                                $hasila = $hasila + $hasil; # gae nambah hasil pertitik jek tasan kui
                            }
                        }    
                    }
                }
                #  | | | | | | | |
                # v v v v v v v v
                echo "Hasil Akhir = ".$hasila."\n\n";
                # GAE TEMPAT PASSING DATA HASIL KE MODEL LAK DI SAVE D DB
                #INSERT INTO table(.....,.....,......) VALUES .....,.......,.......
                #saranku tambah id_pemaine join table pemain
            }

            echo "</pre>";
        }
    }
?>