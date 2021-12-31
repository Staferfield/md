
use db_motherland;
select * from user;
select * from toko;
select * from roti;
select * from nota_penitipan;
select * from item_penitipan;
select * from nota_penjualan;
select * from item_penjualan;


-- Get Nota Penitipan
SELECT nota_penitipan.id AS id, toko.nama AS toko_nama, user.nama AS sales_nama, tanggal, status
FROM nota_penitipan 
LEFT JOIN user ON user.id=nota_penitipan.sales_id
LEFT JOIN toko ON toko.id=nota_penitipan.toko_id
;

-- Get Nota Penitipan Belum Terambil
SELECT nota_penitipan.id AS id, toko.nama AS toko_nama, user.nama AS sales_nama, tanggal, status
FROM nota_penitipan 
LEFT JOIN user ON user.id=nota_penitipan.sales_id
LEFT JOIN toko ON toko.id=nota_penitipan.toko_id
WHERE status=0
;

-- Get Nota Penitipan & Id nota penjualannya
SELECT nota_penitipan.id AS id, 
    toko.nama AS toko_nama, 
    user.nama AS sales_nama, 
    nota_penitipan.tanggal, 
    status, 
    nota_penjualan.titip_id AS nota_id
FROM nota_penitipan
LEFT JOIN user ON user.id=nota_penitipan.sales_id
LEFT JOIN toko ON toko.id=nota_penitipan.toko_id
LEFT JOIN nota_penjualan ON nota_penjualan.titip_id=nota_penitipan.id
ORDER BY tanggal DESC
;


-- Get Nota Penitipan Perbulan
SELECT nota_penitipan.id AS 'No Nota', toko.nama AS 'Nama Toko', user.nama AS 'Nama Sales', tanggal, status
FROM nota_penitipan 
LEFT JOIN user ON user.id=nota_penitipan.sales_id
LEFT JOIN toko ON toko.id=nota_penitipan.toko_id
GROUP BY year(tanggal),month(tanggal)
ORDER BY year(tanggal),month(tanggal)
;

-- Get Item Penitipan
SELECT nota_id, roti.nama, jml_titip 
FROM item_penitipan
LEFT JOIN nota_penitipan ON item_penitipan.nota_id=nota_penitipan.id
LEFT JOIN roti ON item_penitipan.roti_id=roti.id
;

-- Get Item Penitipan (Nota ID)
SELECT nota_id, roti.nama, jml_titip 
FROM item_penitipan
LEFT JOIN nota_penitipan ON item_penitipan.nota_id=nota_penitipan.id
LEFT JOIN roti ON item_penitipan.roti_id=roti.id
WHERE item_penitipan.nota_id=2
;


-- Get Nota Penjualan
SELECT nota_penjualan.id AS id, titip_id, toko.nama AS toko_nama, user.nama AS sales_nama, tanggal
FROM nota_penjualan 
LEFT JOIN user ON user.id=nota_penjualan.sales_id
LEFT JOIN toko ON toko.id=nota_penjualan.toko_id
;

-- Pendapatan Penjualan Perbulan
SELECT nota_id, year(tanggal) As Tahun, month(tanggal) As Bulan, sum(jml_laku) AS 'Roti Terjual', sum(jml_laku*harga) AS 'Total (Rp.)'
FROM nota_penjualan
LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id
GROUP BY year(tanggal),month(tanggal)
ORDER BY year(tanggal),month(tanggal)
;

-- Pendapatan Penjualan Perbulan (6 bulan Terakhir)
SELECT nota_id, year(tanggal) As Tahun, month(tanggal) As Bulan, sum(jml_titip) AS jml_titip, sum(jml_laku) AS jml_laku, sum(jml_laku*harga) AS 'Total (Rp.)'
FROM nota_penjualan
LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id
WHERE YEAR(nota_penjualan.tanggal)>=YEAR(CURRENT_DATE-INTERVAL 6 MONTH) AND MONTH(nota_penjualan.tanggal)>=MONTH(CURRENT_DATE-INTERVAL 6 MONTH)
GROUP BY year(tanggal),month(tanggal)
-- ORDER BY year(tanggal) DESC,month(tanggal) DESC
;


-- Pendapatan Penjualan Bulan Terakhir
SELECT 
    nota_id, year(tanggal) As Tahun, 
    month(tanggal) As Bulan, 
    sum(jml_laku) AS 'Roti Terjual', 
    sum(jml_laku*harga) AS 'Total (Rp.)'
    FROM nota_penjualan
        LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id
    WHERE 
        month(tanggal) = month(NOW())-1
    GROUP BY 
        year(tanggal),month(tanggal)
;

-- Pendapatan Penjualan Pertahun
SELECT 
    nota_id, 
    year(tanggal) As Tahun, 
    sum(jml_laku) AS 'Total Terjual', 
    sum(jml_titip-jml_laku) AS 'Total Diretur', 
    sum(jml_laku*harga) AS 'Pemasukan (Rp.)'
    FROM nota_penjualan
        LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id
    GROUP BY year(tanggal)
    ORDER BY year(tanggal)
;

-- Get Item Penjualan
SELECT 
    item_penjualan.id AS id,
    nota_id, 
    roti.nama, 
    -- select count(item_penjualan.nota_id) AS span FROM item_penjualan GROUP BY nota_id, 
    jml_titip, 
    jml_laku, 
    jml_titip-jml_laku AS jml_retur, 
    item_penjualan.harga, item_penjualan.harga * jml_laku AS subtotal
FROM item_penjualan
LEFT JOIN nota_penjualan ON item_penjualan.nota_id=nota_penjualan.id
LEFT JOIN roti ON item_penjualan.roti_id=roti.id
GROUP BY
    id
;

-- Get Item Penjualan (Nota ID)
SELECT nota_id, roti.nama, jml_titip, jml_laku, jml_titip-jml_laku AS jml_retur, item_penjualan.harga, item_penjualan.harga * jml_laku AS subtotal
FROM item_penjualan
LEFT JOIN nota_penjualan ON item_penjualan.nota_id=nota_penjualan.id
LEFT JOIN roti ON item_penjualan.roti_id=roti.id
WHERE item_penjualan.nota_id=2
;


-- Get Nota Penitipan / Jadwal Pengambilan
SELECT toko.id as toko_id, toko.nama AS toko_nama, user.nama AS sales_nama, toko.alamat as toko_alamat, nota_penitipan.id AS nota_titip, nota, tanggal AS tanggal_titip, DATE_ADD(tanggal , INTERVAL 7 DAY) AS tanggal_ambil, DATEDIFF(DATE_ADD(tanggal , INTERVAL 7 DAY), DATE(NOW())) AS status
FROM toko
LEFT JOIN nota_penitipan ON nota_penitipan.toko_id=toko.id
LEFT JOIN user ON user.id=nota_penitipan.sales_id
WHERE status=0
ORDER BY status DESC
;


-- Kinerja/Performa Sales Total
SELECT 
    user.nama, user.alamat, if(sum(item_penitipan.jml_titip)>0, sum(item_penitipan.jml_titip), 0) as 'Roti Terantarkan'
    FROM user
        LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id
        LEFT JOIN item_penitipan ON item_penitipan.nota_id=nota_penitipan.id AND nota_penitipan.sales_id=user.id
        LEFT JOIN nota_penjualan ON nota_penjualan.sales_id=user.id
        LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id AND nota_penjualan.sales_id=user.id
    WHERE level=4
    GROUP BY 
        user.nama
;


-- Kinerja Sales (Lengkap)   #
SELECT 
        user.id, 
        user.nama, 
        user.alamat, 
        IFNULL(count(nota_penitipan.id), 0) AS pengantaran, 
        IFNULL(count(nota_penjualan.id), 0) AS pengambilan,
        IFNULL(count(nota_penjualan.id)+count(nota_penitipan.id), 0) AS performa,
        (SELECT COUNT(id) FROM nota_penjualan)+(SELECT COUNT(id) FROM nota_penitipan) AS total
    FROM user
        LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id
        LEFT JOIN nota_penjualan ON (nota_penjualan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id) OR (nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id!=user.id AND nota_penitipan.id=nota_penjualan.titip_id)
    WHERE level=4
    GROUP BY 
        user.nama
;

-- Kinerja Sales (Bulan lalu)   #
SELECT 
        user.id, 
        user.nama, 
        user.alamat, 
        IFNULL(count(nota_penitipan.id), 0) AS pengantaran, 
        IFNULL(count(nota_penjualan.id), 0) AS pengambilan,
        (SELECT COUNT(id) FROM nota_penjualan WHERE YEAR(tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))
        +(SELECT COUNT(id) FROM nota_penitipan WHERE YEAR(tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)) AS total,
        IFNULL(sum(item_penitipan.jml_titip),0) as roti_terantar
    FROM user
        LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id AND YEAR(nota_penitipan.tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH)
AND MONTH(nota_penitipan.tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)
        LEFT JOIN nota_penjualan ON (nota_penjualan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id) OR (nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id!=user.id AND nota_penitipan.id=nota_penjualan.titip_id)

        LEFT JOIN item_penitipan ON item_penitipan.nota_id=nota_penitipan.id AND nota_penitipan.sales_id=nota_penitipan.id
        LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id AND nota_penjualan.sales_id=nota_penjualan.id

    WHERE level=4
    GROUP BY 
        user.nama
;

SELECT 
        user.id
        , user.nama
        , user.alamat
        , (SELECT IFNULL(count(id), 0) FROM nota_penitipan WHERE sales_id=user.id AND tanggal >= DATE_SUB(NOW(), INTERVAL 300 DAY) ) AS pengantaran
        , (SELECT IFNULL(count(id), 0) FROM nota_penjualan WHERE sales_id=user.id AND tanggal >= DATE_SUB(NOW(), INTERVAL 300 DAY) ) AS pengambilan
        -- , (SELECT IFNULL(sum(jml_titip), 0) FROM item_penjualan LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id WHERE nota_penitipan.sales_id=user.id AND nota_penitipan.tanggal >= DATE_SUB(NOW(), INTERVAL 300 DAY) ) AS pengambilan
        -- , IFNULL(count(nota_penjualan.id), 0) AS pengambilan
        -- , IFNULL(sum(item_penitipan.jml_titip), 0) AS pengambilan
    FROM user
        -- LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id
        -- LEFT JOIN nota_penjualan ON nota_penjualan.sales_id=user.id
        -- LEFT JOIN item_penitipan ON item_penitipan.nota_id=nota_penitipan.id AND nota_penitipan.sales_id=user.id
    WHERE level=4
    GROUP BY 
        user.id
;
SELECT 
    IFNULL(count(id), 0) 
    FROM nota_penitipan 
    WHERE sales_id=user.id WHERE nota_penitipan.tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)
;


tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)


-- Kinerja Sales (Lengkap)   #Perlu cek lagi, 
SELECT 
        user.id,
        user.nama AS sales_nama,
        user.alamat AS sales_alamat, 
        IFNULL(count(nota_penitipan.id), 0) AS pengantaran, 
        IFNULL(count(nota_penjualan.id), 0) AS pengambilan,
        IFNULL(sum(item_penitipan.jml_titip), 0) as roti_terantar 
    FROM user
        LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id
        LEFT JOIN nota_penjualan ON (nota_penjualan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id) OR (nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id!=user.id AND nota_penitipan.id=nota_penjualan.titip_id)
        LEFT JOIN item_penitipan ON 
            (item_penitipan.nota_id=nota_penitipan.id AND nota_penitipan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id AND nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id=user.id) OR 
            (item_penitipan.nota_id=nota_penitipan.id AND nota_penitipan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id AND nota_penitipan.sales_id!=user.id AND nota_penjualan.sales_id=user.id)
    WHERE level=4
    GROUP BY 
        user.nama
;

-- Kinerja Sales Perbulan
-- Kinerja Sales (Lengkap)   #Perlu cek lagi, 
SELECT 
        user.id,
        user.nama AS sales_nama,
        user.alamat AS sales_alamat, 
        IFNULL(count(nota_penitipan.id), 0) AS pengantaran, 
        IFNULL(count(nota_penjualan.id), 0) AS pengambilan,
        year(nota_penitipan.tanggal) AS tahun,
        month(nota_penitipan.tanggal) AS bulan
    FROM user
        LEFT JOIN nota_penitipan ON nota_penitipan.sales_id=user.id
        LEFT JOIN nota_penjualan ON (nota_penjualan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id) OR (nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id!=user.id AND nota_penitipan.id=nota_penjualan.titip_id)
    WHERE level=4
    GROUP BY 
        user.nama,
        year(nota_penitipan.tanggal),
        month(nota_penitipan.tanggal)
    ORDER BY year(nota_penitipan.tanggal) DESC,month(nota_penitipan.tanggal) DESC
;


-- Performa Toko
SELECT
    nama,
    alamat,
    IFNULL(sum(item_penjualan.jml_titip), 0) AS jml_titip,
    IFNULL(sum(item_penjualan.jml_laku), 0) AS jml_laku,
    IFNULL(sum(item_penjualan.jml_titip - item_penjualan.jml_laku), 0) AS jml_retur,
    ROUND(IFNULL(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip), 0) *100) AS efektifitas 
    FROM 
        toko
    LEFT JOIN nota_penjualan ON nota_penjualan.toko_id=toko.id
    LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id
    GROUP BY 
        nama
;

-- Performa Toko Alternative
SELECT 
    nama,
    alamat,
    sum(item_penjualan.jml_laku) AS jml_laku,
    sum(item_penjualan.jml_titip - item_penjualan.jml_laku) AS jml_retur,
    CONCAT(ROUND(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip)*100), '%') AS efektifitas 
    FROM 
        toko
    LEFT JOIN nota_penjualan ON nota_penjualan.toko_id=toko.id
    LEFT JOIN item_penjualan ON item_penjualan.nota_id=nota_penjualan.id
    GROUP BY 
        nama
;

-- Performa penjualan produk
SELECT 
    roti.id,
    roti.nama AS roti_nama,
    sum(item_penjualan.jml_laku) AS jml_titip,
    sum(item_penjualan.jml_laku) AS jml_laku,
    sum(item_penjualan.jml_titip - item_penjualan.jml_laku) AS jml_retur,
    CONCAT(ROUND(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip)*100), '%') AS performa
    FROM 
        roti
    LEFT JOIN item_penjualan ON item_penjualan.roti_id=roti.id
    LEFT JOIN nota_penjualan ON nota_penjualan.id=item_penjualan.nota_id
    GROUP BY 
        nama
    ORDER BY
        roti.id
;

-- Performa Penjualan Produk Bulan Terakhir
SELECT 
    roti.id,
    roti.nama AS roti_nama,
    sum(item_penjualan.jml_laku) AS jml_titip,
    sum(item_penjualan.jml_laku) AS jml_laku,
    sum(item_penjualan.jml_titip - item_penjualan.jml_laku) AS jml_retur,
    CONCAT(ROUND(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip)*100), '%') AS performa
    FROM 
        roti
    LEFT JOIN nota_penjualan ON YEAR(nota_penjualan.tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(nota_penjualan.tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)
    LEFT JOIN item_penjualan ON nota_penjualan.id=item_penjualan.nota_id AND item_penjualan.roti_id=roti.id
    GROUP BY 
        roti.id, year(tanggal),month(tanggal)
    ORDER BY
        roti.id
;

-- Performa Penjualan Produk Bulan Terakhir #Perlu testing, bagaimana kalo january?
SELECT 
    nama,
    sum(item_penjualan.jml_laku) AS 'Terjual',
    sum(item_penjualan.jml_titip - item_penjualan.jml_laku) AS 'Retur',
    CONCAT(ROUND(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip)*100), '%') AS 'Efektifitas Penjualan'
    FROM 
        roti
    LEFT JOIN item_penjualan ON item_penjualan.roti_id=roti.id
    LEFT JOIN nota_penjualan ON nota_penjualan.id=item_penjualan.nota_id AND month(nota_penjualan.tanggal) = if(month(NOW())-1 = 0, 12, month(NOW())-1)
    GROUP BY 
        nama, year(tanggal),month(tanggal)
;







EXPLAIN SELECT * FROM roti;



$this->db
  ->select('name')
  ->like('name', $your_search_val)
  ->get('table_name');
