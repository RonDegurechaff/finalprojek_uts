<?php

include '../Controllers/Controller_petugas.php';
// Membuat Object dari Class petugas
$petugas = new Controller_petugas();
$GetPetugas = $petugas->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>
<div class="card border-dark">
    <div class="card-header bg-secondary text-white">OOP - Class, Object, Property, Method With <u>MVC</u></div>
    <div class="card-body text-dark">
        <h4 class="card-title">CRUD and CSRF</h4>
        <h5 class="card-title">Table Petugas</h5>
        <h5 class=" card-title"><a class="btn btn-primary" href="main.php?menu=<?php echo base64_encode('id_po_pet') ?>">Add Data</a></h5>

        <p class="card-text">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Level</th>
                    <th scope="col" class="text-center">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Decision validation variabel
                if (isset($GetPetugas)) {
                    $no = 1;
                    foreach ($GetPetugas as $Get) {
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $Get['username']; ?></td>
                            <td><?php echo $Get['password']; ?></td>
                            <td><?php echo $Get['nama_petugas']; ?></td>
                            <td><?php echo $Get['level']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary" href="main.php?menu=<?php echo base64_encode('id_pu_pet') ?>&id_petugas=<?php echo base64_encode($Get['id_petugas']) ?>"><i class="fa fa-eye" width="24"></i></a>

                                <button class="btn btn-outline-danger" onclick="konfirmasi('<?php echo base64_encode($Get['id_petugas']) ?>')"><i class="fa fa-trash" width="24"></i></button>
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
    function konfirmasi(id_petugas) {
        var a = id_petugas;
        if (window.confirm("Apakah anda ingin menghapus data ini?")) {
            window.location.href = '../Config/Routes.php?function=delete_petugas&id_petugas=' + a;
        };
    }
</script>