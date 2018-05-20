-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 07:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juritonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurit_artikel`
--

CREATE TABLE `jurit_artikel` (
  `id_artikel` int(11) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `viewer` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `statusartikel_id` tinyint(2) NOT NULL COMMENT '1 = aktif, 2 = non aktif',
  `statuspublish_id` tinyint(2) NOT NULL COMMENT '1 = publish, 2 draft',
  `url_artikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurit_artikel`
--

INSERT INTO `jurit_artikel` (`id_artikel`, `tgl_input`, `user_id`, `judul`, `deskripsi`, `gambar`, `viewer`, `thumbnail`, `statusartikel_id`, `statuspublish_id`, `url_artikel`) VALUES
(3, '2016-08-25 10:13:25', 1, 'Tips Mencari Pekerjaan', '<p>Zaman sekarang, informasi bagaikan emas. Saking berharganya, seringkali mereka yang pintar namun kurang informasi terkalahkan oleh mereka yang mungkin tidak begitu pintar namun mendapat informasi yang tepat. Seperti halnya saat kita sedang mencari kerja, tentu kita sangan membutuhkan informasi tepat untuk mendapat pekerjaan impian. Sungguh sayang jika potensi kita tidak tersalurkan hanya karena kita tidak mengetahui suatu informasi. Eits, informasi untuk kita yang sedang mencari kerja tidak hanya informasi lowongan. Kita juga perlu tahu tentang perusahaan, pekerjaan, dan selalu meng-update informasi-informasi umum. Mari kita bahas satu persatu!<br><br><strong>1. Lowongan</strong><br><br>Lowongan jelas menjadi informasi pertama yang dicari para pencari kerja. Banyak cara untuk mendapatkan informasi lowongan pekerjaan. Media massa selalu menjadi andalan untuk mendapat info lowongan. Biasanya lowongan pekerjaan banyak dijumpai pada koran hari Sabtu. Selain media massa, internet menjadi rujukan utama untuk mendapatkan informasi lowongan terbaru. Perlu diketahui, perusahaan besar dan institusi pemerintah banyak yang memajang pengumuman rekrutmen di internet. Formulir biasanya langsung diisi secara online, bahkan tes seleksi tak jarang juga secara online. Bagi perusahaan, internet menjamin persebaran yang lebih luas, murah, namun prosesnya praktis. Saat mencari info di media massa dan internet, kadang yang kita dapatkan bukan lowongan untuk kita. Akali hal tersebut dengan saling bertukar informasi. Jalin kesepakatan dengan teman untuk saling memberi info jika ada lowongan cocok untuk kita. Kita bisa saja mengajak teman yang berbeda kualifikasi atau berbeda minat dengan kita. Sama-sama untung, kan?!<br><br><strong>2. Perusahaan</strong><br><br>Ternyata banyak pencari kerja yang belum banyak mengenal perusahaan-perusahaan di Indonesia. Biasanya kita hanya mengenal perusahaan yang bergerak di sektor publik atau berhubungann langsung dengan konsumen. Padahal, banyak sekali perusahaan di luar sana yang membutuhkan keahlian kita. Dengan mengenalnya, kita bisa mendapatkan perusahaan langsung dari situs resminya. Selain itu, kita bisa mengetahui kredibilitas perusahaan-perusahaan jika kita mengenalnya dengan baik. Standar gaji, gambaran pekerjaan, jenjang karir, dan penempatan pun tidak lagi menjadi misteri seperti halnya kita belum mengetahui suatu perusahaan sama sekali. Perusahaan pun, tentu saja lebih suka menerima pelamar yang memang tertarik dan mengenal perusahaanya dengan baik.<br><br><strong>3. Pekerjaan</strong><br><br>Ketahui dengan baik, pekerjaan apa yang sesuai dengan kualifikasi kita. Jauh lebih baik jika kita tahu bagaimana detil pekerjaan tersebut, gaji untuk pekerjaan tersebut, apakah ada larangan untuk menikah selama beberapa tahun pertama. Sebaliknya, pelajari kualifikasi apa yang dibutuhkan di posisi itu. Jangan menyerah, cari cara untuk mencapai kualifikasi yang disyaratkan pekerjaan impian kita. Misalnya jika kita menginginkan pekerjaan yang berhubungan dengan klien-klien dari berbagai negara, berarti kita harus upgrade kemampuan bahasa kita. Dengan mengantongi informasi tentang pekerjaan, kita terhindar dari membuang waktu untuk mengejar pekerjaan yang kita anggap bagus, namun ternyata tidak cocok dengan kualifikasi kita.<br><br><strong>4. Update!</strong><br><br>Jangan malas untuk selalu memperbarui informasi. Jangan hanya memantengi kolom lowongan pekerjaan melulu. Lahap semua informasi, siapa tahu informasi itu berguna bagi kita. Raih kesempatan untuk terlihat cerdas dan tidak ketinggalan informasi saat seleksi penerimaan kerja nanti. Jadi jangan sampai datang ke seleksi dengan kepala kosong, tanpa tahu pekerjaan seperti apa yang kita lamar, tanpa mengenal baik perusahaan tempat kita melamar. Bukannya begitu?<br><br><br>Sumber Berita : www.smkn1cermegresik.sch.id</p>', 'uploads/thumbnail/kerja1.jpg', 119, 'uploads/thumbnail/kerja1_thumb.jpg', 1, 1, 'tips-mencari-pekerjaan'),
(5, '2016-08-26 09:00:50', 1, 'Spam Dalam Dunia Email dan Website', '<p>Tentu Anda pernah mendapatkan email iklan/promosi yang datangnya secara berkala masuk dalam Inbox Anda, padahal Anda tidak pernah mendaftarkan email Anda untuk dikirimi iklan/promosi seperti itu, bahkan parahnya ada juga yang membabi buta, dimana dalam sehari, Anda bisa mendapatkan pulahan/ratusan email iklan/promosi. Inilah yang disebut spam.</p>\r\n<p>Begitu juga apabila Anda mempunyai website/blog, terutama website yang mempunyai fasilitas komentar, buku tamu, atau juga shoutbox dan Anda mendapati komentar-komentar yang berisi iklan/promosi atau komentar-komentar yang tidak ada hubungannya dengan artikel/berita yang dimaksud pada website Anda, maka bisa dipastikan itu adalah ulah spam, apalagi datangnya secara berkala dan terus-menerus.</p>\r\n<p><strong>Adapun tujuan spam adalah sebagai berikut :</strong></p>\r\n<ol>\r\n<li>Sebagai media publikasi dan promosi produk-produk perusahaan si pengirim email sampah. Sebagai contoh sebuah perusahaan farmasi ingin menjual obat mereka, jika melalui advertising/periklanan ini tentu akan memakan biaya. Dengan menggunakan mail robot maka ia akan dapat mengirim email sebanyak-banyaknya ke seluruh pemilik email/website.</li>\r\n<li>Bom email, jika Anda memiliki musuh di internet atau saingan perusahaan Anda biasanya hal ini akan dilakukan agar Anda repot menerima email yang tidak Anda perlukan dalam jumlah besar dan terus menerus.</li>\r\n<li>Media pushing, hal ini dilakukan untuk menggaet sebanyak-banyak orang yang akan terjebak dengan link trap (perangkap link), sehingga Anda mengira Anda akan berada di situs yang sebenarnya, padahal Anda sudah dalam perangkapnya.</li>\r\n<li>Media penyebaran virus & worm, sudah merupakan karakter dari virus dan worm untuk menyebarkan filenya secara otomatis ke seluruh pemilik email/website yang ada di dunia, dengan tujuan akan mendapatkan korban yang sebanyak-banyaknya.</li>\r\n</ol>\r\n<p>Pada website http://smkn1cermegresik.sch.id sebelumnya pernah mendapatkan sejumlah kiriman email iklan/promosi yang masuk dalam buku tamu secara berkala tiap harinya jadi merepotkan sekali harus menghapus satu persatu dari menu admin. Tapi sekarang system sudah diperbaiki jadi tidak kuatir lagi ada spam yang masuk dan yang penting tidak repot-repot mengapus tiap harinya. Ya gak?</p>\r\n<p>Oke, sekarang diambil pertanyaan, kok bisa ya sebuah website/blog yang ada fasilitas input data maka secara otomatis diserang spam, apa lagi tidak ada sekuritas dalam menghalau spam. Sebenarnya spam murupakan bahasa mesin (skrip/program) yang secara otomatis mengirimkan data komentar cara terus-menerus. Jadi yang mengirimkan iklan/promosi seperti itu sebenarnya bukan manusia melainkan sebuah mesin atau bisa dikatakan teknologi komputer yang mengerjakan.<br> <br>Salah satu cara untuk menghalau spam adalah dengan menggunakan code CAPTCHA (Completely Automated Public Turing test tell Computers and Humans Apart). Di website ini sudah dilengkapi dengan code CAPTHCHA pada input data yang ada dan karena juga masukkan dari salah satu pengunjung untuk meningkatkan sekuritas pada website ini.<br>(Heri/s)</p>\r\n<p><br>Sumber Berita: www.smkn1cermegresik.sch.id</p>', 'uploads/thumbnail/spam.png', 216, 'uploads/thumbnail/spam_thumb.png', 1, 1, 'spam-dalam-dunia-email-dan-website'),
(7, '2016-09-04 12:10:56', 4, 'Dhcp server client dan arp table mikrotik part 1', '<p><img src="/uploads/artikel/image/dhcp server1.png" alt="deskripsi" width="776" height="436"></p>\r\n<p>Halo teman-teman ,kali ini saya akan memberi pengetahuan tentang mikrotik  , tutor ini akan saya bagi menjadi 2 part , part pertama adalah tentang konfigurasi dhcp server dan dhcp client di mikrotik , part kedua adalah penggunaan arp table pada dhcp atau statik client.</p>\r\n<p>Untuk topologi bisa dijelaskan lebih lanjut pada gambar diatas. RO ISP 1 adalah dhcp server yang memberi ip pada client RO 1 dan RO 2 berdasarkan mac address mereka , dan RO BLOCK USER adalah router yang diblok untuk melakukan DHCP REQUEST</p>\r\n<p>Sedangkan pada RO 1 , terdapat sub network yang memberi ip dynamic pada dynamic user dan ip statik pada static user, tanpa ada kebijakan apapun.</p>\r\n<p>Pertama kita konfigurasi RO 1:</p>\r\n<p>1.Konfigurasi ip</p>\r\n<pre>admin@RO 1>ip address add address=192.168.2.1/24 interface=ether2\r\nadmin@RO 1>ip address add address=192.168.3.1/24 interface=ether3\r\nadmin@RO 1>ip address print\r\nFlags: X - disabled, I - invalid, D - dynamic \r\n # ADDRESS NETWORK INTERFACE \r\n 0 192.168.2.1/24 192.168.2.0 ether2 \r\n 1 192.168.3.1/24 192.168.3.0 ether3\r\n\r\n</pre>\r\n<p>2.Konfigurasi DHCP SERVER  RO 1:</p>\r\n<pre>admin@RO 1>ip dhcp-server setup\r\nSelect interface to run DHCP server on \r\n\r\ndhcp server interface: ether2\r\nSelect network for DHCP addresses \r\n\r\ndhcp address space: 192.168.2.0/24\r\nSelect gateway for given network \r\n\r\ngateway for dhcp network: 192.168.2.1\r\nSelect pool of ip addresses given out by DHCP server \r\n\r\naddresses to give out: 192.168.2.2-192.168.2.254\r\nSelect DNS servers \r\n\r\ndns servers: 8.8.8.8\r\nSelect lease time \r\n\r\nlease time: 3d</pre>\r\n<p>3.Selanjutnya konfigurasi dhcp client pada client dan coba ping ke dhcp server</p>\r\n<p> </p>\r\n<p>Kedua , sekarang kita konfigurasi RO ISP 1:</p>\r\n<p>1.Pertama konfigurasi ip nya :</p>\r\n<pre>admin@ISP 1>ip address add address=192.168.1.1/24\r\nadmin@ISP 1>ip address print\r\nFlags: X - disabled, I - invalid, D - dynamic \r\n # ADDRESS NETWORK INTERFACE \r\n 0 192.168.1.1/24 192.168.1.0 ether1</pre>\r\n<p>2.Selanjutnya konfigurasi dhcp servernya</p>\r\n<pre>admin@ISP 1>ip dhcp-server add add-arp=yes \r\nadmin@ISP 1>ip dhcp-server print\r\nFlags: X - disabled, I - invalid \r\n # NAME INTERFACE RELAY ADDRESS-POOL LEASE-TIME ADD-ARP\r\n 0 dhcp1 ether1         static-only    3d         yes \r\n\r\n</pre>\r\n<p>konfigurasi dhcp server pada ISP 1 berbeda dengan RO 1 , karena kita hanya memberi ip dynamic pada mac address client yang sudah terdaftar saja.</p>\r\n<p>3.Selanjutnya kita konfigurasi dhcp networknya , agar client dapat mendapatkan informasi seperti dns server, gateway dan lain"</p>\r\n<pre>admin@ISP 1>ip dhcp-server network add address=192.168.1.0/24 gateway=\r\n192.168.1.1 dns-server=8.8.8.8 ntp-server=192.168.1.1\r\nadmin@ISP 1>ip dhcp-server network print detail\r\n 0 address=192.168.1.0/24 gateway=192.168.1.1 dns-server=8.8.8.8 wins-server="" \r\n ntp-server=192.168.1.1 dhcp-option="" \r\n\r\n</pre>\r\n<p>4.Lalu kita tambah client pada dhcp-server</p>\r\n<pre>admin@ISP 1>ip dhcp-server lease add address=192.168.1.50 mac-address=\r\n00:00:AB:77:35:00 rate-limit="512k/512k" server=dhcp1\r\nadmin@ISP 1>ip dhcp-server lease add address=192.168.1.51 mac-address=\r\n00:00:AB:CD:A9:00 rate-limit="128k/128k" server=dhcp1\r\nadmin@ISP 1>ip dhcp-server lease print\r\nFlags: X - disabled, R - radius, D - dynamic, B - blocked \r\n # ADDRESS MAC-ADDRESS HO SER.. RA\r\n 0 192.168.1.50 00:00:AB:77:35:00 RO dhcp1 51\r\n 1 192.168.1.51 00:00:AB:CD:A9:00 RO dhcp1 12</pre>\r\n<p>pada konfigurasi diatas kita menambahkan rate-limit untuk melimit bandwith client , jika kita menyetting rate-limit maka otomatis terbuat simple queque di mikrotik.</p>\r\n<p>5.Selanjutnya dhcp client konfigurasi pada client RO 1 dan RO 2.</p>\r\n<pre>admin@RO 1>ip dhcp-client add interface=ether1 disabled=no\r\nadmin@RO 1>ip dhcp-client print \r\nFlags: X - disabled, I - invalid \r\n 0 interface=ether1 add-default-route=yes default-route-distance=1 \r\n use-peer-dns=yes use-peer-ntp=yes status=bound address=192.168.1.50/24 \r\n gateway=192.168.1.1 dhcp-server=192.168.1.1 primary-dns=8.8.8.8 \r\n primary-ntp=192.168.1.1 expires-after=2d23h58m13s \r\n\r\n\r\n</pre>\r\n<p>konfigurasi dhcp client pada RO 2 sama saja dengan RO 1, hanya penyesuaian di mana port ether yang mengarah ke ISP 1.</p>\r\n<p>sekian tutorial kali ini tentang <a href="http://jurit.online/blog/artikel/8/dhcp-server-client-dan-arp-table-mikrotik-part-2" target="_blank">dhcp server client dan arp table mikrotik part 1</a>,</p>\r\n<p><strong>ikuti part 2 pada link berikut ini :</strong></p>\r\n<p><span xss=removed><strong><a xss=removed title="part 2" href="http://jurit.online/blog/artikel/8/dhcp-server-client-dan-arp-table-mikrotik-part-2" target="_blank">dhcp server client dan arp table mikrotik part 2</a></strong></span></p>', 'uploads/thumbnail/dhcp_server1.png', 356, 'uploads/thumbnail/dhcp_server1_thumb.png', 1, 1, 'dhcp-server-client-dan-arp-table-mikrotik-part-1'),
(8, '2016-09-04 12:16:11', 4, 'Dhcp server client dan arp table mikrotik part 2', '<p><img src="/uploads/artikel/image/dhcp server1.png" alt="deskripsi" width="803" height="452"></p>\r\n<p>Melanjutkan tutor <a href="http://jurit.online/blog/artikel/7/dhcp-server-client-dan-arp-table-mikrotik-part-1" target="_blank">part 1</a> sebelumnya , kali ini saya akan menerangkan tentang arp table pada mikrotik.</p>\r\n<p><span id="result_box" lang="id"><span class="hps">Sebuah router</span> <span class="hps">memiliki</span> <span class="hps">tabel ARP</span> <span class="hps">yang berisi</span> <span class="hps">entri</span> <span class="hps">ARP</span>. <span class="hps">Entri</span> <span class="hps">ARP</span> <span class="hps">terdiri dari </span><span class="hps">alamat IP</span> <span class="hps">dan alamat</span> <span class="hps">hardware </span></span><span id="result_box" lang="id"><span class="hps"><span class="hps atn">(</span>MAC Address) yang sesuai .</span> Pada Router Mikrotik tabel ARP bisa dilihat pada menu <strong>/ip arp</strong></span></p>\r\n<pre>admin@RO 1>ip arp print\r\nFlags: X - disabled, I - invalid, H - DHCP, D - dynamic \r\n # ADDRESS MAC-ADDRESS INTERFACE \r\n 0 D 192.168.3.2 00:50:79:66:68:03 ether3 \r\n 1 D 192.168.1.1 00:00:AB:A3:38:00 ether1 \r\n 2 D 192.168.2.253 00:50:79:66:68:01 ether2 \r\n 3 D 192.168.2.254 00:50:79:66:68:00 ether2 \r\n 4 D 192.168.3.3 00:50:79:66:68:02 ether3</pre>\r\n<p>diatas telah terlihat ip dan mac yang terkoneksi ke RO 1</p>\r\n<p>1.Penerapan pada jaringan Statik Ip</p>\r\n<p>sekarang kita menerapkan arp table tadi untuk membuat kebijakan pembagian ip , misal pada sub network RO 1 terdapat kelompok Static User yang mana ip dari user kelompok ini statik , dan kita ingin membuat setiap user tidak mengganti-ganti ip address itu.</p>\r\n<pre>admin@RO 1>ip arp add address=192.168.3.2 mac-address=00:50:79:66:68:03\r\ninterface=ether3\r\nadmin@RO 1>ip arp add address=192.168.3.3 mac-address=00:50:79:66:68:02\r\ninterface=ether3\r\nadmin@RO 1>ip arp print\r\nFlags: X - disabled, I - invalid, H - DHCP, D - dynamic \r\n # ADDRESS MAC-ADDRESS INTERFACE \r\n 0 192.168.3.2 00:50:79:66:68:03 ether3 \r\n 1 192.168.3.3 00:50:79:66:68:02 ether3 \r\n\r\n</pre>\r\n<p>lalu ubah konfigurasi pada interface ether3 yang mengarah ke client statik user</p>\r\n<pre>admin@RO 1>interface ethernet set numbers=ether3 arp=reply-only\r\nadmin@RO 1>interface ethernet print\r\nFlags: X - disabled, R - running, S - slave \r\n # NAME MTU MAC-ADDRESS ARP \r\n 0 R ether1 1500 00:00:AB:77:35:00 enabled \r\n 1 R ether2 1500 00:00:AB:77:35:01 enabled \r\n 2 R ether3 1500 00:00:AB:77:35:02 reply-only\r\n 3 R ether4 1500 00:00:AB:77:35:03 enabled</pre>\r\n<p>sekarang coba pada client untuk mengubah ip addressnya apa masih bisa mengakses ke internet atau tidak.Dan setelah dicoba akses client time out</p>\r\n<p>2.Penerapan pada jaringan DHCP</p>\r\n<p>untuk penerapan pada jaringan dhcp cukup menambahkan properti</p>\r\n<pre>add-arp=yes</pre>\r\n<p>pada konfigurasi list server dhcp dan konfigurasi</p>\r\n<pre>arp=reply-only</pre>\r\n<p>pada konfigurasi interface yang di gunakan untuk dhcp-server</p>\r\n<p>Setelah konfigurasi selesai , maka client yang melakukan setting ip manual akan diblokir.</p>\r\n<p>Sekian tutor saya tentang <a href="http://jurit.online/blog/artikel/7/dhcp-server-client-dan-arp-table-mikrotik-part-1" target="_blank">Dhcp server client dan arp table mikrotik</a> tunggu tutor lainnya pada kesempatan lain.</p>', 'uploads/thumbnail/dhcp_server11.png', 320, 'uploads/thumbnail/dhcp_server11_thumb.png', 1, 1, 'dhcp-server-client-dan-arp-table-mikrotik-part-2'),
(9, '2016-09-11 12:12:02', 1, 'Informasi Perubahan Jadwal Tes Viera dan TOEIC', '<p><img xss=removed src="/uploads/artikel/image/toeic.jpg" alt="" width="398" height="216"></p>\r\n<p>Sehubungan dengan adanya kendala teknis pada sistem Direktorat yang menyebabkan tidak berfungsinya laman tes viera dengan baik, sebagai solusinya kami mengubah jadwal tes Viera dan TOEIC sebagai berikut :</p>\r\n<p><strong><span lang="EN-US">PENTING :</span></strong><span lang="EN-US"> <em>setiap sekolah dianjurkan melaksanakan tes VIERA dengan jumlah peserta 25 siswa/sesi</em></span></p>\r\n<p><strong><span lang="EN-US">Jadwab Test Viera :</span></strong></p>\r\n<ol>\r\n<li>DKI Jakarta : 14 - 17 Sep</li>\r\n<li>Banten : 14 - 17 Sep</li>\r\n<li>Jawa Barat : 19 - 24 Sep</li>\r\n<li>Jawa Tengah : 26 Sep - 1 Okt</li>\r\n<li>DIY : 26 Sep - 1 Okt</li>\r\n<li>Jawa Timur : 3 - 8 Okt</li>\r\n<li>Bali : 3 - 8 Okt</li>\r\n<li>Lampung : 10 - 15 Okt</li>\r\n<li>NAD : 10 - 15 Okt</li>\r\n<li>Jambi : 10 - 15 Okt</li>\r\n<li>Bangka Belitung : 10 - 15 Okt</li>\r\n<li>Kepulauan Riau : 10 - 15 Okt</li>\r\n<li>Riau : 10 - 15 Okt</li>\r\n<li>Sumatera Barat : 10 - 15 Okt</li>\r\n<li>Sumatera Selatan : 10 - 15 Okt</li>\r\n<li>Sumatera Utara : 10 - 15 Okt</li>\r\n<li>Kalimantan Barat : 10 - 15 Okt</li>\r\n<li>Kalimantan Selatan : 10 - 15 Okt</li>\r\n<li>Kalimantan Timur : 10 - 15 Okt</li>\r\n<li>Kalimantan Utara : 10 - 15 Okt</li>\r\n<li>Gorontalo : 17 - 22 Okt</li>\r\n<li>Sulawesi Barat : 17 - 22 Okt</li>\r\n<li>Sulawesi Selatan : 17 - 22 Okt</li>\r\n<li>Sulawesi Tenggara : 17 - 22 Okt</li>\r\n<li>Sulawesi Utara : 17 - 22 Okt</li>\r\n<li>Maluku : 17 - 22 Okt</li>\r\n<li>N/A : 17 - 22 Okt</li>\r\n<li>NTB : 17 - 22 Okt</li>\r\n<li>NTT : 17 - 22 Okt</li>\r\n<li>Papua : 17 - 22 Okt </li>\r\n</ol>\r\n<p>Diharapkan setiap SMK yang telah melakukan pendaftaran dapat menyelesaikan tes VIERA sesuai jadwal yang ditetapkan. Hasil dari pelaksanaan VIERA akan menjadi bahan masukan bagi Dit.PSMK dalam melakukan perencanaan peningkatan mutu pendidikan bahasa Inggris secara nasional.</p>\r\n<p>Disamping itu juga data VIERA akan menjadi salah satu pertimbangan bagi Dit.PSMK untuk menyalurkan program “Bantuan Sertifikasi TOEIC” bagi siswa SMK di Indonesia yang akan dilaksanakan dalam 2 Gelombang:</p>\r\n<p>Gelombang 1: Sep – Okt 2016</p>\r\n<p>Gelombang 2: Feb – Mar 2017</p>\r\n<p>Bagi SMK yang belum berkesempatan mengikuti tes tahun ini jangan khawatir karena akan ada kesempatan di gelombang 2 tahun 2017 sesuai dengan keterangan diatas. Mari Kembali Semangat dan Tunjukan Kemampuanmu !</p>\r\n<p>Untuk Informasi lebih lengkap dan jika ada pertanyaan silakan hubungi Tim Narahubung kami:</p>\r\n<ol>\r\n<li>Firdaus    : 085772919442</li>\r\n<li>Qudsi      : 085219519692</li>\r\n<li>Rara         : 081584093122</li>\r\n<li>Bukhori    : 085319175707</li>\r\n<li>Acep        : 081385108272</li>\r\n</ol>\r\n<p>Demikian kami sampaikan informasi ini. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>\r\n<p><strong>Lampiran :</strong></p>\r\n<p><a href="http://bit.ly/2c09KJu">Pemberitahuan Perubahan Jadwal Tes</a></p>\r\n<p><strong>Sumber Berita :</strong></p>\r\n<p><em>https://psmk.kemdikbud.go.id/konten/1889/informasi-perubahan-jadwal-tes-viera-dan-toeic</em></p>', 'uploads/thumbnail/toeic.jpg', 311, 'uploads/thumbnail/toeic_thumb.jpg', 1, 1, 'informasi-perubahan-jadwal-tes-viera-dan-toeic'),
(11, '2016-11-11 14:20:39', 1, 'SMK Negeri 1 Cerme Gresik Raih Kitto Award 2016', '<p>Lagi-lagi SMKN 1 Cerme Gresik membuat bangga Kabupatennya. Kali ini bukan karena prestasi siswa melainkan prestasi sekolah secara menyeluruh. SMK yang terletak di pinggiran ini nyatanya mampu menyejajarkan diri dengan SMK lain di nusantara yang jauh lebih senior, elit, dan berpengalaman. Berdasarkan penobatan yang disampaikan langsung oleh Direktur Pembinaan SMK, Drs Mustagfirin Amin MBA, SMK Negeri 1 Cerme Gresik berhasil meraih Kitto Award 2016.</p>\r\n<p> <img xss=removed src="/uploads/artikel/image/smk.jpg" alt="" width="263" height="320"></p>\r\n<p>Tentu ini sebuah prestasi yang membanggakan. Hanya ada 30 Kepala SMK Negeri dan Swata yang mendapat penghargaan ini. Mereka berasal dari SMK-SMK Terbaik Indonesia, dari Sabang sampai Merauke. Dari Gresik, insya Allah hanya SMK yang beralamat di Jalan Jurit Kec. Cerme ini yang meraih.</p>\r\n<p>Kitto Award 2016 diberikan sebagai bentuk apresiasi atas komitmen, dedikasi dan rekam jejak yang prestatif para kepala SMK. Rekam jejak ini dinilai selama 10 tahun terakhir kiprah mereka (sekolah) dalam dunia pendidikan. Penghargaan tersebut diberikan langsung kepada Kepala SMKN 1 Cerme Gresik di Hotel Santika Malang, 30 Oktober 2016.</p>\r\n<p>Sebagai informasi, Tim Panel Kitto Award 2016 terdiri dari, Direktorat PSMK, Drs Mustagfirin Amin (menjabat sebagai ketua panel), Rektor Surplus Motivation Prof Wahyudi, Kepala P4TK Malang Dr Sumarno, dan Direktur Pusat Pengembangan Manajemen (PPM) Jakarta, Dr Amelia Djalil.</p>\r\n<p>Kegiatan ini digagas oleh Penerbit Kitto Mahesa sebagai bentuk kepedulian terhadap pendidikan di Indonesia. Dengan penghargaan yang diraih, maka sekolah tersebut layak dijadikan rujukan bagi SMK lain. Selamat untuk SMKN 1 Cerme Gresik, semoga bisa menginspirasi sekolah lain untuk menjadi lebih baik.</p>\r\n<p><em>Sumber : <a href="http://majalah-alasjurit.blogspot.co.id/2016/11/smkn-1-cerme-raih-kitto-award-2016.html">http://majalah-alasjurit.blogspot.co.id/2016/11/smkn-1-cerme-raih-kitto-award-2016.html</a></em></p>', 'uploads/thumbnail/smk.jpg', 146, 'uploads/thumbnail/smk_thumb.jpg', 1, 1, 'smk-negeri-1-cerme-gresik-raih-kitto-award-2016');

-- --------------------------------------------------------

--
-- Table structure for table `jurit_kategoriartikel`
--

CREATE TABLE `jurit_kategoriartikel` (
  `id_kategoriartikel` int(11) NOT NULL,
  `nm_kategoriartikel` varchar(50) NOT NULL,
  `url_kategoriartikel` varchar(100) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurit_kategoriartikel`
--

INSERT INTO `jurit_kategoriartikel` (`id_kategoriartikel`, `nm_kategoriartikel`, `url_kategoriartikel`, `tgl_input`, `user_id`) VALUES
(1, 'Motivasi', 'motivasi', '2016-08-22 11:46:02', 1),
(2, 'Tutorial', 'tutorial', '2016-08-22 13:15:04', 1),
(3, 'Tips & Trik', 'tips-trik', '2016-08-22 13:15:23', 1),
(4, 'Asal-Usul', 'asal-usul', '2016-08-26 08:55:13', 3),
(5, 'Informasi', 'informasi', '2016-08-26 08:58:29', 1),
(6, 'mikrotik', 'mikrotik', '2016-09-04 12:05:29', 4),
(7, 'UAS', 'uas', '2016-09-30 01:59:58', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jurit_kategoriartikeldetail`
--

CREATE TABLE `jurit_kategoriartikeldetail` (
  `id_kategoriartikel` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurit_kategoriartikeldetail`
--

INSERT INTO `jurit_kategoriartikeldetail` (`id_kategoriartikel`, `id_artikel`) VALUES
(2, 14),
(1, 15),
(15, 15),
(6, 20),
(1, 20),
(14, 20),
(8, 20),
(7, 20),
(5, 20),
(6, 21),
(18, 22),
(17, 22),
(12, 23),
(19, 24),
(12, 24),
(19, 25),
(12, 25),
(18, 26),
(1, 27),
(18, 27),
(22, 29),
(24, 34),
(23, 34),
(24, 36),
(23, 38),
(23, 39),
(24, 40),
(22, 40),
(22, 42),
(2, 2),
(4, 4),
(6, 8),
(1, 3),
(5, 5),
(6, 7),
(5, 9),
(5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `jurit_statususer`
--

CREATE TABLE `jurit_statususer` (
  `userstatus_id` int(2) NOT NULL,
  `userstatus_nm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurit_statususer`
--

INSERT INTO `jurit_statususer` (`userstatus_id`, `userstatus_nm`) VALUES
(1, 'AKTIF'),
(2, 'BLOCKED'),
(3, 'BELUM VERIFIKASI EMA');

-- --------------------------------------------------------

--
-- Table structure for table `jurit_userlevel`
--

CREATE TABLE `jurit_userlevel` (
  `userlevel_id` int(11) NOT NULL,
  `userlevel_nm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurit_userlevel`
--

INSERT INTO `jurit_userlevel` (`userlevel_id`, `userlevel_nm`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `jurit_users`
--

CREATE TABLE `jurit_users` (
  `user_id` int(10) NOT NULL,
  `userlevel_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `userstatus_id` int(2) NOT NULL DEFAULT '3',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurit_users`
--

INSERT INTO `jurit_users` (`user_id`, `userlevel_id`, `nama`, `password`, `email`, `profile`, `facebook`, `gambar`, `userstatus_id`, `created_at`) VALUES
(1, 1, 'Admin', '$2y$10$ETtpyGIlWZ3bSlij8b/82uNjOZg/a11u9/bLVArW901m99mHXxEye', 'admin@email.com', 'Akun Admin Jurit Online', '', 'uploads/profile/user1.png', 1, '2017-03-17 05:57:26'),
(4, 2, 'User', '$2y$10$eKkGLPENV48jMWVYWKPL5.CP5bHIECDvsm3.mRB1ABTEQUMnLKfEq', 'user@email.com', 'Akun User Jurit Online', '', 'uploads/profile/user.png', 1, '2017-03-17 05:54:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurit_artikel`
--
ALTER TABLE `jurit_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `jurit_kategoriartikel`
--
ALTER TABLE `jurit_kategoriartikel`
  ADD PRIMARY KEY (`id_kategoriartikel`);

--
-- Indexes for table `jurit_statususer`
--
ALTER TABLE `jurit_statususer`
  ADD PRIMARY KEY (`userstatus_id`);

--
-- Indexes for table `jurit_userlevel`
--
ALTER TABLE `jurit_userlevel`
  ADD PRIMARY KEY (`userlevel_id`);

--
-- Indexes for table `jurit_users`
--
ALTER TABLE `jurit_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurit_artikel`
--
ALTER TABLE `jurit_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jurit_kategoriartikel`
--
ALTER TABLE `jurit_kategoriartikel`
  MODIFY `id_kategoriartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jurit_userlevel`
--
ALTER TABLE `jurit_userlevel`
  MODIFY `userlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurit_users`
--
ALTER TABLE `jurit_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
