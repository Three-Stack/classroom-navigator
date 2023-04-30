use `db`;

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `class_id` VARCHAR(10) DEFAULT NULL,
    `section` VARCHAR(10) DEFAULT NULL,
    `class_nbr` VARCHAR(10) DEFAULT NULL,
    `capacity` INT(11) DEFAULT NULL,
    `class_name` VARCHAR(255) DEFAULT NULL,
    `units` VARCHAR(5) DEFAULT NULL,
    `start_time` VARCHAR(50) DEFAULT NULL,
    `end_time` VARCHAR(50) DEFAULT NULL,
    `days` VARCHAR(10) DEFAULT NULL,
    `location` VARCHAR(255) DEFAULT NULL,
    `start_date` DATE DEFAULT NULL,
    `end_date` DATE DEFAULT NULL,
    `session` VARCHAR(255) DEFAULT NULL,
    `instructor` VARCHAR(255) DEFAULT NULL,
    `mode` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `classrooms` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `classroom_nbr` INT(10) DEFAULT NULL,
    `building` INT(10) DEFAULT NULL,
    `floor` INT(10) DEFAULT NULL,
    `x1` INT(10) DEFAULT NULL,
    `y1` INT(10) DEFAULT NULL,
    `x2` INT(10) DEFAULT NULL,
    `y2` INT(10) DEFAULT NULL,
    `x3` INT(10) DEFAULT NULL,
    `y3` INT(10) DEFAULT NULL,
    `x4` INT(10) DEFAULT NULL,
    `y4` INT(10) DEFAULT NULL,
    `x5` INT(10) DEFAULT NULL,
    `y5` INT(10) DEFAULT NULL,
    `x6` INT(10) DEFAULT NULL,
    `y6` INT(10) DEFAULT NULL,
    `x7` INT(10) DEFAULT NULL,
    `y7` INT(10) DEFAULT NULL,
    `x8` INT(10) DEFAULT NULL,
    `y8` INT(10) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (4,8,1,2443,1871,2803,2251,2446,2273,2815,1885,2472,2352,3178,2360,3180,2727,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (5,8,1,1900,1872,2349,2234,1929,2232,2363,1869,1944,2344,3178,2360,3180,2727,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (16,8,1,1370,1872,1801,2234,1378,2240,1825,1872,1405,2347,3178,2360,3180,2727,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (23,8,1,849,1590,1176,1770,856,1770,1180,1590,1241,1681,1274,2368,3200,2374,3180,2727);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (52,8,1,3390,2480,3890,2750,3876,2476,3387,2750,3775,2405,3178,2360,3180,2727,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (51,8,1,3329,1867,3756,2265,3332,2261,3752,1865,3562,2360,3178,2360,3180,2727,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (48,8,1,3677,1375,4059,1675,3704,1669,4041,1364,3776,1297,3208,1285,3180,2727,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (139,8,2,883,385,1528,723,921,714,1514,383,1523,809,3209,842,3162,1649,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (138,8,2,1054,993,1647,1428,1079,1404,1636,668,1645,894,3241,894,3218,1645,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (142,8,2,2434,991,3072,1426,2418,1413,3056,984,3038,885,3241,899,3196,1800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (147,8,2,3409,999,3973,1428,3405,1424,3962,979,3880,887,3216,903,3171,1792,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (149,8,2,3762,405,4049,739,3756,739,4031,387,4015,812,3197,880,3182,1776,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (110,8,2,2296,1596,2910,2102,2306,2096,2908,1584,2316,2190,3210,2190,3216,1822,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (118,8,2,1392,1574,1955,2122,1399,2103,1840,2196,1833,2916,3209,2222,3224,1841,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (121,8,2,891,1947,1350,2105,2119,889,1330,1960,1090,2181,3236,2178,3211,1837,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (135,8,2,897,1590,1354,1911,887,1897,1356,1583,848,1851,837,2214,3212,2211,3203,1834);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (122,8,2,501,2340,1108,2714,497,2714,1108,2357,1091,2264,3191,2228,3200,1328,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (260,8,3,3335,1791,3759,2123,3349,2125,3748,1803,3288,2087,3200,2087,3173,1852,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (261,8,3,3351,1580,3766,1760,3338,1758,3746,1571,3288,1600,3189,1600,3205,1803,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (247,8,3,3340,996,3631,1440,3344,1449,3635,998,3263,1005,3200,1005,3198,1791,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (249,8,3,3669,980,3946,1438,3673,1440,3971,987,3946,901,3193,881,3187,1805,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (246,8,3,2773,986,3063,1433,2766,1436,3070,1000,3033,900,3210,900,3210,1796,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (209,8,3,2498,1581,2694,1920,2484,1939,2691,1570,2675,2179,3185,2190,3144,1810,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (241,8,3,2173,994,2680,1418,2176,1410,2719,1002,2702,887,3170,887,3176,1796,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (248,8,3,3405,384,3691,742,3404,745,3693,374,3428,805,3213,827,3170,1751,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (250,8,3,3755,411,4044,747,3752,733,4030,398,4020,804,3193,848,3190,1810,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (210,8,3,1815,1807,2253,2096,1831,2112,2239,1801,1991,2180,3160,2197,3152,1806,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (211,8,3,1248,1570,1740,2116,1259,2120,1767,1575,1706,2184,3153,2175,3161,1821,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (212,8,3,881,1962,1214,2107,892,2107,1218,1948,1088,2181,3177,2183,3186,1818,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (233,8,3,246,1613,655,1911,255,1890,670,1655,721,1857,760,2202,3190,2202,3190,1842);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (234,8,3,240,976,668,1377,253,1369,651,992,730,1358,735,2182,3149,2187,3197,1808);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (237,8,3,860,361,1115,743,855,746,1130,386,989,805,3156,853,3179,1815,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (239,8,3,1168,370,1783,731,1185,740,1783,372,1737,798,3173,798,3173,1531,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (303,8,4,3384,1554,3834,2106,3375,2097,3831,1551,3666,2130,3234,2130,3234,1770,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (302,8,4,3913,1543,4292,2094,3900,2089,4290,1560,4090,2135,3248,2135,3248,1767,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (304,8,4,3454,2310,4072,2690,3444,2687,4066,2333,3497,2251,3242,2238,3219,1788,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (309,8,4,2310,2319,2943,2682,2316,2685,2955,2328,2649,2253,3258,2244,3243,1776,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (308,8,4,2380,1563,2956,2070,2400,2056,2940,1560,2880,2160,3250,2156,3213,1760,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (312,8,4,1614,1566,2157,2077,1623,2067,2144,1561,2125,2161,3200,2146,3206,1798,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (311,8,4,2093,2321,2272,2672,2118,2678,2266,2321,2223,2247,3233,2235,3245,1785,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (320,8,4,1114,1561,1561,2108,1102,2104,1569,1555,1415,1253,3210,2158,3179,1792,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (321,8,4,828,2328,1347,2658,861,1320,2346,1281,1286,2265,3208,2200,3189,1793,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (331,8,4,1067,979,1840,1404,1097,1385,1846,965,1654,872,3206,885,3224,1788,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (341,8,4,2312,985,3072,1408,2326,1399,3077,965,3016,887,3241,887,32146,1805,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (346,8,4,3398,957,3936,1409,3394,1402,3940,942,3328,1331,3250,1331,3220,1780,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (345,8,4,3475,368,4060,706,3469,718,4069,352,3472,785,3200,785,3200,1473,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (348,8,4,3996,940,4300,1413,4200,1410,4293,936,4010,866,3256,866,3243,1790,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (301,9,3,698,1292,1188,1646,710,1630,1156,1290,1451,1596,1471,1901,1961,1905,1926,1755);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (333,9,3,862,2133,1370,2509,864,2515,1391,2119,1444,1912,1950,1912,1950,1794,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (335,9,3,698,1716,1200,2048,700,2056,1188,1706,1456,1716,1478,1910,1478,1910,1478,1822);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (303,9,3,725,866,1340,1206,697,1224,1355,847,1456,1132,1456,1882,1925,1882,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (305,9,3,1465,486,1942,943,1460,928,1937,476,1534,1038,1534,1872,1942,1872,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (307,9,3,2001,474,2446,957,2010,957,2443,471,2383,1033,1562,1033,1562,1838,1960,1838);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (309,9,3,2501,473,2765,934,2534,960,2763,475,2529,1032,1561,1037,1561,1853,1953,1856);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (311,9,3,2828,472,3356,940,2832,956,3352,488,2880,1020,3212,1032,3212,1168,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (313,9,3,3419,469,3823,936,3425,944,3821,463,3485,1026,3225,1018,3225,1174,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (325,9,3,2823,2030,3317,2496,2846,2501,3314,2040,3042,1927,1939,1939,1939,1832,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (329,9,3,1449,2050,2316,2465,1454,2492,2303,2041,2086,1941,1937,1928,1937,1837,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (119,9,1,410,1133,780,1357,419,1348,793,1133,464,1093,254,1084,254,424,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (115,9,1,1086,1137,1244,1232,1083,1229,1247,1132,1199,1095,273,1095,273,436,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (111,9,1,1281,1137,1688,1355,1272,1363,1684,1137,1371,1098,279,1098,279,426,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (151,9,1,975,393,1238,618,970,622,1244,392,1041,656,270,656,270,450,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (147,9,1,522,398,923,617,530,612,935,395,612,659,280,659,280,450,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (141,9,1,29,386,196,453,25,455,195,387,213,442,302,442,302,386,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (139,9,1,27,493,191,620,26,625,200,484,220,491,209,491,209,388,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (133,9,1,31,763,194,987,33,997,192,760,227,779,264,779,264,450,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (269,9,2,32,146,306,376,39,378,307,151,250,421,406,421,406,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (271,9,2,334,147,482,371,334,368,487,146,354,421,404,421,404,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (273,9,2,525,146,670,369,521,368,681,148,656,421,407,421,407,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (275,9,2,708,147,859,373,712,382,866,144,735,421,410,421,410,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (277,9,2,897,149,1058,381,899,378,1056,147,1020,425,402,425,402,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (279,9,2,1089,162,1236,363,1092,372,1236,163,1113,426,393,426,393,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (281,9,2,1283,161,1418,359,1278,362,1434,161,1390,427,403,427,403,400,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (283,9,2,1464,161,1685,357,1484,363,1695,171,1500,423,1500,800,1348,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (285,9,2,1555,447,1703,732,1541,743,1698,438,1514,740,1506,790,1344,790,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (243,9,2,1510,900,1690,1104,1521,1096,1693,910,1527,859,1339,859,1339,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (245,9,2,1341,900,1477,1115,1352,1108,1473,906,1356,857,1337,857,1337,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (247,9,2,1146,902,1304,1108,1148,1113,1315,904,1297,855,1353,855,1353,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (249,9,2,970,902,1116,1098,974,1116,1118,902,990,850,1346,850,1346,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (251,9,2,786,904,935,1114,786,1109,935,897,804,857,1340,857,1340,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (253,9,2,588,908,744,1096,604,1096,740,904,720,852,1346,852,1346,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (255,9,2,405,912,561,1101,423,1101,561,906,447,855,1340,855,1340,800,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (257,9,2,261,898,376,1124,264,1119,376,898,314,859,275,853,275,480,402,477);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (259,9,2,36,901,233,1119,40,1122,238,901,209,860,271,860,271,474,403,474);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (263,9,2,38,526,194,749,44,753,205,527,235,530,235,477,400,477,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (241,9,2,1744,883,1891,1119,1746,1115,1892,883,1891,850,2377,850,2377,776,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (239,9,2,1924,886,2087,114,1933,1112,2081,890,1934,847,2365,847,2365,776,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (205,9,2,1748,296,2080,460,1751,461,2090,293,2122,383,2122,785,2365,785,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (207,9,2,2188,118,2336,335,2189,335,2342,109,2323,385,2159,385,2161,794,2369,791);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (209,9,2,2370,115,2495,341,2371,340,2496,111,2486,390,2158,390,2158,790,2365,790);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (211,9,2,2524,112,2707,331,2531,340,2711,114,2699,385,2151,385,2151,792,2361,792);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (213,9,2,2743,109,2896,334,2743,329,2896,115,2890,386,2177,385,2179,784,2395,784);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (217,9,2,2935,125,3074,333,2935,330,3079,118,3081,390,2170,402,2170,792,2370,792);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (219,9,2,3114,104,3307,342,3119,343,3307,108,3126,384,2170,384,2170,782,2370,792);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (435,9,4,736,1913,1363,2503,753,2510,1423,1916,1503,1933,1996,1993,1996,1853,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (431,9,4,1480,2060,2393,2506,1500,2506,2400,2066,1693,1980,1938,1980,1938,1853,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (429,9,4,2483,2060,2731,2524,2474,2535,2738,2060,2499,1978,1958,1979,1958,1853,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (427,9,4,2784,2059,3028,2524,2815,2530,3042,2063,2813,1991,1971,1991,1971,1853,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (425,9,4,3106,2068,3358,2522,3092,2542,3364,2068,3118,1984,1970,1984,1970,1853,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (423,9,4,3419,2069,3838,2516,3427,2500,3826,2081,3452,1978,1977,1978,1977,1853,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (401,9,4,730,879,1398,1484,753,1471,1404,905,1477,1186,1477,1880,1983,1880,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (403,9,4,1477,505,1927,958,1490,958,1923,505,1573,1047,1573,1847,1973,1847,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (405,9,4,1973,502,2419,958,1980,945,2419,515,2340,1064,1586,1064,1586,1854,1976,1861);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (409,9,4,2907,514,3840,940,2951,955,3833,518,3448,1037,3248,1037,3248,1181,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (523,9,5,2402,2026,3283,2506,2459,2490,3279,2048,3211,1960,3351,1960,3351,1102,2083,1102);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (521,9,5,6654,2045,3729,2516,3361,2516,3740,2032,3369,1974,3369,1135,3051,1135,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (507,9,5,2594,474,3366,938,2602,936,3422,496,3326,1034,3054,1034,3054,1178,NULL,NULL);
INSERT INTO `classrooms` (`classroom_nbr`,`building`,`floor`,`x1`,`y1`,`x2`,`y2`,`x3`,`y3`,`x4`,`y4`,`x5`,`y5`,`x6`,`y6`,`x7`,`y7`,`x8`,`y8`) VALUES (503,9,5,1352,492,2164,928,1388,912,2144,484,2104,1040,3036,1040,3036,1176,NULL,NULL);
