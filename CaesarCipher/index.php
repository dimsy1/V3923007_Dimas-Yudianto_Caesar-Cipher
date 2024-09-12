<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4><b>CAESAR CIPHER</b></h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['enkripsi'])) { //mengeksekusi enkripsi 
                    function cipher($char, $key)
                    { //menampung data yang telah di input
                        if (ctype_alpha($char)) { //cek alphabet atau tidak
                            $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                            $ch = ord($char); //konversi char yang diinput ke ASCII
                            $mod = fmod($ch + $key - $nilai, 26); //perhitangan modulus dengan  jumlah alphabet=26
                            $hasil = chr($mod + $nilai); //hasil modulus ditambah dengan nilai dan konversi ke bentuk alphabet, dan tampung dalam variabel
                            return $hasil; //mengembalikan nilai hasil
                        } else { //jika yang diinput bukan alphabet maka kembalikan nilai char
                            return $char;
                        }
                    }
                    //fungsi enkripsi
                    function enkripsi($input, $key)
                    {
                        $output = ""; //variabel yang menampung string
                        $chars = str_split($input); //variabel untuk menampung data
                        //berisi dengan data input yang dikonversi ke dalam bentuk array
                        foreach ($chars as $char) { //perulangan untuk menampilkan data array
                            $output .= cipher($char, $key); //berisi hasil function cipher
                        }
                        return $output; //mengembalikan nilai
                    }
                    //buat fungsi dekripsi
                    function dekripsi($input, $key)
                    {
                        return enkripsi($input, 26 - $key); //mengembalikan nilai fungsi enkripsi
                    }

                    //mengeksekusi enkripsi 
                } else if (isset($_POST['dekripsi'])) {
                    function cipher($char, $key)
                    { //buat fungsi cipher 
                        if (ctype_alpha($char)) { //cek alphabet atau tidak
                            $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                            $ch = ord($char); //konversi char yang diinput ke ASCII
                            $mod = fmod($ch + $key - $nilai, 26); //perhitangan modulus dengan  jumlah alphabet=26
                            $hasil = chr($mod + $nilai); //hasil modulus ditambah dengan nilai dan konversi ke bentuk alphabet, dan tampung dalam variabel
                            return $hasil; //mengembalikan nilai yang telah di inputkan
                        } else { //jika yang diinput bukan alphabet maka kembalikan nilai char
                            return $char;
                        }
                    }

                    //buat fungsi enkripsi
                    function enkripsi($input, $key)
                    {
                        $output = ""; //variabel yang menampung string
                        $chars = str_split($input); //variabel untuk menampung data array
                        //berisi dengan data input yang dikonversi ke dalam bentuk array
                        foreach ($chars as $char) { //perulangan untuk menampilkan data array
                            $output .= cipher($char, $key); //berisi hasil function cipher
                        }
                        return $output; //mengembalikan nilai output
                    }

                    //buat fungsi dekripsi
                    function dekripsi($input, $key)
                    {
                        return enkripsi($input, 26 - $key); //mengembalikan nilai fungsi enkripsi, namun jumlah alphabet dikurangi key
                    }
                }
                ?>

                <!-- Form input -->
                <form name="skd" method="post">
                    <div class="input-group">
                        <input type="text" name="plain" class="form-control" placeholder="Input Text">
                    </div>
                    <div class="input-group">
                        <input type="number" name="key" class="form-control" placeholder="Input Key">
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-success" type="submit" name="enkripsi" value="Enkripsi">
                        <input class="btn btn-danger" type="submit" name="dekripsi" value="Dekripsi">
                    </div>
                </form>
            </div>
            <!-- Bagian hasil enkripsi/dekripsi -->
            <div class="card-header output">
                <h4><b>HASIL</b></h4>
            </div>
            <div class="card-body result">
                <table>
                    <tr>
                        <td>Output yang dihasilkan:</td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) {
                                    echo enkripsi($_POST['plain'], $_POST['key']); //memanggil fungsi enkripsi dan menampilkannya
                                }
                                if (isset($_POST['dekripsi'])) {
                                    echo dekripsi($_POST['plain'], $_POST['key']); //memanggil fungsi dekripsi dan menampilkannya
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Text yang dimasukkan:</td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) {
                                    echo dekripsi(enkripsi($_POST['plain'], $_POST['key']), $_POST['key']); //menampilkan teks asli yang dienkripsi
                                }
                                if (isset($_POST['dekripsi'])) {
                                    echo enkripsi(dekripsi($_POST['plain'], $_POST['key']), $_POST['key']); //menampilkan teks asli yang didekripsi
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Key:</td>
                        <td><b><?php if (isset($_POST['enkripsi'])) {
                                    echo $_POST['key']; //menampilkan key yang digunakan
                                }
                                if (isset($_POST['dekripsi'])) {
                                    echo $_POST['key']; //menampilkan key yang digunakan
                                } ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>