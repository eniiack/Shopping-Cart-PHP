-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 10:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `family` varchar(50) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `cart` text COLLATE utf8_persian_ci NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `fullname`, `email`, `comment`, `created_at`) VALUES
(1, 'بهناز', 'behnaz@info.com', 'خوبه.', '2019-05-25 14:16:02'),
(3, 'بهناز', 'behnaz@info.com', 'ختماونلئتتلئب', '2019-05-26 10:03:01'),
(4, 'فرشید مرادی', 'farshid.moradi199658@gmail.com', 'تنذتنذتنذ', '2019-12-24 15:21:00'),
(5, 'فرشید مرادی', 'farshid.moradi199658@gmail.com', 'تنذتنذتنذ', '2019-12-24 15:21:12'),
(6, 'فرشید مرادی', 'farshid.moradi199658@gmail.com', 'فلذاتدن', '2019-12-25 18:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `comment`, `created_at`) VALUES
(10, 'فرشید', 'farshid.moradi199658@gmail.com', 'sad', 'saf', '2019-12-24 16:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `product_name`, `image`, `created_at`) VALUES
(5, 'پیتزا', '_____.jpg', '2019-05-24 15:28:01'),
(6, 'پاستا', '_____-2_000.jpg', '2019-05-24 15:28:58'),
(7, 'پیتزا', '_____-2.jpg', '2019-05-24 15:29:14'),
(8, 'پاستا', '______000.jpg', '2019-05-24 15:29:37'),
(9, 'پیتزا', '_____-3.jpg', '2019-05-24 15:30:08'),
(10, 'پاستا', '_____-5_000.jpg', '2019-05-24 15:30:18'),
(11, 'پیتزا', '_____-5.jpg', '2019-05-24 15:30:42'),
(12, 'پاستا', '_____-4.jpg', '2019-05-24 15:33:21'),
(13, 'پاستا', '_____-3_000.jpg', '2019-05-24 15:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_index`
--

CREATE TABLE `gallery_index` (
  `id` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `mini` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_index`
--

INSERT INTO `gallery_index` (`id`, `name_product`, `image`, `created_at`, `mini`) VALUES
(1, 'پیترا', 'gallery2.jpg', '2019-05-25 15:03:28', NULL),
(2, 'همبرگر', 'gallery1.jpg', '2019-05-25 15:03:28', NULL),
(3, 'پیترا', 'gallery3.jpg', '2019-05-25 15:04:23', 1),
(4, 'مرغ سوخاری', 'gallery4.jpg', '2019-05-25 15:04:23', 1),
(5, 'پیترا', 'gallery5.jpg', '2019-05-25 15:05:32', 1),
(6, 'پیترا', 'gallery6.jpg', '2019-05-25 15:05:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(50) DEFAULT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `product_title`, `product_name`, `product_description`, `product_price`, `image`, `created_at`) VALUES
(1, 'pizza', 'پیتزاهروئیک', 'هروئیکا (سینه مرغ دودی + قارچ + فلفل دلمه + پیاز + زيتون)همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, '1.png', '2019-05-24 16:11:49'),
(2, 'pizza', 'پیتزا گوشت و قارچ', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 25500, '4.jpg', '2019-05-24 16:12:25'),
(3, 'pizza', 'پیتزا سبزیجات', 'سبزيجات (قارچ + ذرت + گوجه فرنگي + فلفل دلمه + پياز + زيتون)ا همراه با سالاد و نوشیدنی و پیش غذا', 15500, '6.jpg', '2019-05-24 16:12:57'),
(4, 'sandwich', 'ساندویچ فیله گوساله', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, 'file.jpg', '2019-05-24 16:13:44'),
(5, 'sandwich', 'ساندویچ ذغالی برگر', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, 'zoghali.jpg', '2019-05-24 16:14:04'),
(6, 'sandwich', 'ساندویچ مخلوط (گوشت و مرغ)', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, 'makhlot.jpg', '2019-05-24 16:14:22'),
(7, 'sandwich', 'ساندویچ رست بیف', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, 'rostbif.jpg', '2019-05-24 16:14:39'),
(8, 'pasta', 'پاستا آلفردو', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, 'پاستا.jpg', '2019-05-24 16:15:00'),
(9, 'pasta', 'پاستا سبزیجات', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, '_____-3.jpg', '2019-05-24 16:15:21'),
(10, 'pasta', 'پاستا پروشتو', 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', 27500, '______000.jpg', '2019-05-24 16:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `offer_customers`
--

CREATE TABLE `offer_customers` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_customers`
--

INSERT INTO `offer_customers` (`id`, `title`, `price`, `description`, `image`, `created_at`) VALUES
(1, 'پیتزاهروئیک', 2500000, 'هروئیکا (سینه مرغ دودی + قارچ + فلفل دلمه + پیاز + زيتون)همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', '1.png', '2019-05-25 14:33:02'),
(4, 'پیتزا گوشت و قارچ', 2500000, 'قارچ و گوشت (گوشت چرخ كرده + قارچ + فلفل دلمه + پياز + زيتون) همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', '4.jpg', '2019-05-25 14:49:12'),
(5, 'پیتزا سبزیجات', 2500000, 'سبزيجات (قارچ + ذرت + گوجه فرنگي + فلفل دلمه + پياز + زيتون)ا همراه با سالاد و نوشیدنی و پیش غذا', '6.jpg', '2019-05-25 14:50:32'),
(6, 'پیتزاهروئیک', 2500000, 'هروئیکا (سینه مرغ دودی + قارچ + فلفل دلمه + پیاز + زيتون)همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', '1.png', '2019-05-25 14:50:32'),
(7, 'پاستا آلفردو', 2500000, 'سبزيجات (قارچ + ذرت + گوجه فرنگي + فلفل دلمه + پياز + زيتون)ا همراه با سالاد و نوشیدنی و پیش غذا', '10.jpg', '2019-05-25 14:51:43'),
(8, 'پاستا سبزیجات', 2500000, 'سبزيجات (قارچ + ذرت + گوجه فرنگي + فلفل دلمه + پياز + زيتون)ا همراه با سالاد و نوشیدنی و پیش غذا', '11.jpg', '2019-05-25 14:51:43'),
(9, 'پاستا پروشتو', 2500000, 'سبزيجات (قارچ + ذرت + گوجه فرنگي + فلفل دلمه + پياز + زيتون)ا همراه با سالاد و نوشیدنی و پیش غذا', '12.jpg', '2019-05-25 14:52:28'),
(10, 'پیتزاهروئیک', 2500000, 'هروئیکا (سینه مرغ دودی + قارچ + فلفل دلمه + پیاز + زيتون)همراه با سالاد مورد نظر و نوشیدنی و پیش غذا', '1.png', '2019-05-25 14:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 'پیتزا', 'ویژگیِ منحصر به فرد پیتزا، قابلیتِ بالای آن برای داشتنِ تنوع است', 'home_bistro_boxbg1.jpg', '2019-05-25 17:53:30'),
(2, 'پاستا', 'انواع پاستا، لازانیا، قارچ های جنگلی مختلف همگی از کشور ایتالیا تهیه می شوند', 'home_bistro_boxbg2.jpg', '2019-05-25 17:53:30'),
(3, 'دسر', 'انواع دسر های ایرانی و فرنگی مناسب برای هر ذائقه', 'home_bistro_boxbg3.jpg', '2019-05-25 17:54:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_index`
--
ALTER TABLE `gallery_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_customers`
--
ALTER TABLE `offer_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery_index`
--
ALTER TABLE `gallery_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offer_customers`
--
ALTER TABLE `offer_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
