<?php

include '../Controllers/Controller_spp.php';
// Membuat Object dari Class spp
$spp = new Controller_spp();
$GetSpp = $spp->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>

<div class="card border-dark">
    <div class="card-header bg-secondary text-white">OOP - Class, Object, Property, Method With <u>MVC</u></div>
    <div class="card-body text-dark">
        <h4 class="card-title">CRUD and CSRF</h4>
        <h5 class="card-title">Table Spp</h5>
        <h5 class=" card-title"><a class="btn btn-primary" href="main.php?menu=<?php echo base64_encode('id_po_sp') ?>">Add Data</a></h5>

        <p class="card-text">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Nominal</th>
                    <th scope="col" class="text-center">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Decision validation variabel
                if (isset($GetSpp)) {
                    $no = 1;
                    foreach ($GetSpp as $Get) {
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $Get['tahun']; ?></td>
                            <td><?php echo $Get['nominal']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary" href="main.php?menu=<?php echo base64_encode('id_pu_sp') ?>&id_spp=<?php echo base64_encode($Get['id_spp']) ?>"><i class="fa fa-eye" width="24"></i></a>

                                <button class="btn btn-outline-danger" onclick="konfirmasi('<?php echo base64_encode($Get['id_spp']) ?>')"><i class="fa fa-trash" width="24"></i></button>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
        </p>
    </div>
</div>

<script>
    function konfirmasi(id_spp) {
        var a = id_spp;
        if (window.confirm("Apakah anda ingin menghapus data ini?")) {
            window.location.href = '../Config/Routes.php?function=delete_spp&id_spp=' + a;
        }
    }
</script>