          
<?php 
                    if(isset($_GET['halaman'])){
                        $hal = $_GET['halaman'];
                
                        switch ($hal) {
                            case 'home_sa':
                                include "home_sa.php";
                                break;
                            case 'home_op':
                                include "home_op.php";
                                break;
                            case sha1('home_pe'):
                                include "home_pe.php";
                                break;

                            //User
                            case 'pengguna_tampil':
                                include "super/pengguna/pengguna_tampil.php";
                                break;
                            case 'pengguna_tambah':
                                include "super/pengguna/pengguna_tambah.php";
                                break;
                            case 'pengguna_ubah':
                                include "super/pengguna/pengguna_ubah.php";
                                break;
                            case 'pengguna_hapus':
                                include "super/pengguna/pengguna_hapus.php";
                                break;

                            //Info
                            case 'info_tampil':
                                include "super/info/info_tampil.php";
                                break;
                            case 'info_ubah':
                                include "super/info/info_ubah.php";
                                break;
                            case 'kasperusahaan':
                                include "super/info/dapat_tampil.php";
                                break;

                            //Layanan
                            case 'layanan_tampil':
                                include "super/layanan/layanan_tampil.php";
                                break;
                            case 'layanan_tambah':
                                include "super/layanan/layanan_tambah.php";
                                break;
                            case 'layanan_ubah':
                                include "super/layanan/layanan_ubah.php";
                                break;
                            case 'layanan_hapus':
                                include "super/layanan/layanan_hapus.php";
                                break;

                            //Pelanggan
                            case 'pelanggan_tampil':
                                include "super/pelanggan/pelanggan_tampil.php";
                                break;
                            case 'pelanggan_tambah':
                                include "super/pelanggan/pelanggan_tambah.php";
                                break;
                            case 'pelanggan_ubah':
                                include "super/pelanggan/pelanggan_ubah.php";
                                break;
                            case 'pelanggan_hapus':
                                include "super/pelanggan/pelanggan_hapus.php";
                                break;
                            case 'nonaktif':
                                include "super/pelanggan/status_no.php";
                                break;
                            case 'aktif':
                                include "super/pelanggan/status_ok.php";
                                break;

                                //Pemakaian
                            case 'pakai_tambah':
                                include "super/pakai/pakai_tambah.php";
                                break;
                            case 'pakai_tampil':
                                include "super/pakai/pakai_tampil.php";
                                break;
                            case 'pakai_hapus':
                                include "super/pakai/pakai_hapus.php";
                                break;
                            case 'pakai_view':
                                include "super/pakai/pakai_view.php";
                                break;

                                //Tagihan
                            case 'tagih_tampil':
                                include "super/tagih/tagih_tampil.php";
                                break;
                            case 'lunas_tampil':
                                include "super/tagih/lunas_tampil.php";
                                break;
                            case 'tagih_bayar':
                                include "super/tagih/tagih_bayar.php";
                                break;
                            case 'tagih_hapus':
                                include "super/tagih/tagih_hapus.php";
                                break;

                                //lap
                            case 'lap_masuk':
                                include "lap/laporan_masuk.php";
                                break;
                            case 'lap_tag':
                                include "lap/laporan_tagihan.php";
                                break;

                                

            //##################### PELAGAN ##########################################################

                            //Tagihan
                            case sha1('p_tagih_tampil'):
                                include "pelanggan/tagih/tagih_tampil.php";
                                break;
                            case sha1('p_lunas_tampil'):
                                include "pelanggan/tagih/lunas_tampil.php";
                                break;
                        
                                //default
                             default:
                                echo "<center><h1> ERROR !</h1></center>";
                                break;    
                        }
                    }else{
                        if($data_level=="Operator"){
                            include "home_op.php";
                            }
                            elseif($data_level=="Pelanggan"){
                                include "home_pe.php";
                                }
                                elseif($data_level=="Administrator"){
                                    include "home_sa.php";
                                    }
                    }
                ?>