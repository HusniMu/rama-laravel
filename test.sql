SELECT temp_cc.itkode, temp_cc.itnama, temp_cc.qty, new_qty, ROW.row
FROM temp_cc, (
SELECT if(b.judtgl>="2021-02-06", (SUM(a.judqtydebet)- SUM(a.judqtykredit)) AS new_qty, '0')
(SUM(a.judqtydebet)- SUM(a.judqtykredit)) AS new_qty
FROM
jurnaldetail a
left JOIN jurnal b ON a.juno = b.juno
left JOIN item c ON a.itkode = c.itkode
WHERE c.suspended <> 1 AND a.deleted IS NULL AND b.deleted IS NULL AND b.suspended IS NULL
AND b.jutgl >= "2021-02-06"
GROUP BY c.itkode) AS new_qty,
(SELECT FOUND_ROWS() AS row) AS row
WHERE temp_cc.juno = "AJ-2021-02-06" LIMIT 10 OFFSET 0;
