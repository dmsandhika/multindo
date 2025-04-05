<!DOCTYPE html>
<html>
<head>
    <title>Data Calon Karyawan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Calon Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Posisi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($karyawan as $k): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $k['nama']; ?></td>
                    <td><?= $k['nik']; ?></td>
                    <td><?= $k['posisi']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
