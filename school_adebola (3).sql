-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2025 at 09:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_adebola`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_school`
--

CREATE TABLE `admin_school` (
  `admin_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_school`
--

INSERT INTO `admin_school` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin Officer', 'admin@gmail.com', '$2y$10$ZVFZlFYBYU4qoZ9nfFDOT.gmirKTRkR5Hz/zhvAX7oMajWHDzxsAK');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `faculty_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Community Health', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(2, 1, 'Family Health Care Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(3, 1, 'Public Health Nursing', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(4, 1, 'Social Work and Health Care Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(5, 1, 'Certificate Course in Reproductive and Family Health', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(6, 2, 'Environmental Health Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(7, 2, 'Occupational Health and Safety Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(8, 2, 'Environmental Health Assistant', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(9, 3, 'Public Health Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(10, 3, 'Nutrition and Dietetics', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(11, 3, 'Health Education and Promotion', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(12, 3, 'Certificate Health Education and Promotion', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(13, 4, 'Pharmacy Technician', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(14, 4, 'Dispensing Opticianry', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(15, 5, 'Health Information Management', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(16, 5, 'Health Information Technician', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(17, 5, 'Health Education and Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(18, 5, 'Computer Science', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(19, 6, 'Orthopaedic Cast', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(20, 6, 'Prosthetics and Orthotics Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(21, 7, 'Medical Laboratory Technician', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(22, 7, 'Biomedical Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(23, 7, 'Medical Imaging Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(24, 8, 'Anesthesia Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(25, 9, 'Dental Surgery Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(26, 9, 'Dental Therapy', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(27, 9, 'Dental Health Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(28, 9, 'Dental Surgery Technician', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(29, 10, 'Paramedics Technology', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(30, 10, 'X-Ray Technician', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(31, 10, 'Community Nutrition Technician', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(32, 10, 'Food Hygienist', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(33, 10, 'Health Assistant Medical', '2025-12-05 07:59:06', '2025-12-05 07:59:06'),
(34, 10, 'Epidemiology and Disease Control', '2025-12-05 07:59:06', '2025-12-05 07:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `created_at`, `updated_at`) VALUES
(1, 'Department of Community Health', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(2, 'Department of Environmental Health Sciences', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(3, 'Department of Education and Public Health Sciences', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(4, 'Department of Pharmacy', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(5, 'Department of Health Information and Technology', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(6, 'Department of Orthopedic', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(7, 'Department of Medical Laboratory Technology', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(8, 'Department of Anesthesia', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(9, 'Department of Dental Sciences', '2025-12-05 07:57:22', '2025-12-05 07:57:22'),
(10, 'Department of Paramedic and Emergency Services', '2025-12-05 07:57:22', '2025-12-05 07:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `jamb_details`
--

CREATE TABLE `jamb_details` (
  `student_id` int(11) NOT NULL,
  `jamb_reg` text NOT NULL,
  `subject_1` text NOT NULL,
  `subject_2` text NOT NULL,
  `subject_3` text NOT NULL,
  `subject_4` text NOT NULL,
  `score_1` text NOT NULL,
  `score_2` text NOT NULL,
  `score_3` text NOT NULL,
  `score_4` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jamb_details`
--

INSERT INTO `jamb_details` (`student_id`, `jamb_reg`, `subject_1`, `subject_2`, `subject_3`, `subject_4`, `score_1`, `score_2`, `score_3`, `score_4`, `created_at`, `updated_at`) VALUES
(1, '202534589EA', 'Government', 'Literature in English', 'Government', 'Further Mathematics', '10', '50', '45', '66', '2025-12-04 15:29:13', '2025-12-04 15:29:13.975094');

-- --------------------------------------------------------

--
-- Table structure for table `olevel_details`
--

CREATE TABLE `olevel_details` (
  `olevel_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `olevel_type` text NOT NULL,
  `olevel_reg` text NOT NULL,
  `olevel_year` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `olevel_details`
--

INSERT INTO `olevel_details` (`olevel_id`, `student_id`, `olevel_type`, `olevel_reg`, `olevel_year`, `created_at`, `updated_at`) VALUES
(5, 1, 'WAEC', '18832504EB', '2020', '2025-12-04 15:21:57', '2025-12-04 15:21:57'),
(12, 4, ' WAEC', '18832504EC', ' 2020', '2025-12-05 08:14:13', '2025-12-05 08:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `olevel_result`
--

CREATE TABLE `olevel_result` (
  `result_id` int(11) NOT NULL,
  `olevel_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `grade` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `olevel_result`
--

INSERT INTO `olevel_result` (`result_id`, `olevel_id`, `subject`, `grade`) VALUES
(9, 5, 'Computer Studies', 'B3'),
(10, 12, 'Economics', 'C5'),
(11, 12, 'Health Science', 'C4'),
(12, 12, 'Further Mathematics', 'E8'),
(13, 12, 'Physics', 'C5'),
(14, 12, 'Christian Religious Studies', 'C6'),
(15, 12, 'Painting & Decorating', 'C6'),
(16, 12, 'Blocklaying, Bricklaying & Concreting', 'C6'),
(17, 12, 'Building Construction', 'C5'),
(18, 12, 'Store Keeping', 'C5');

-- --------------------------------------------------------

--
-- Table structure for table `payment_record`
--

CREATE TABLE `payment_record` (
  `payment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `payment_type` text NOT NULL DEFAULT 'acceptance_fee',
  `reference` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_record`
--

INSERT INTO `payment_record` (`payment_id`, `student_id`, `payment_type`, `reference`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'acceptance_fee', 'swad8i745s', '', '2025-11-21 10:38:12', '2025-11-21 10:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `application_number` text NOT NULL,
  `password` text NOT NULL,
  `department` text NOT NULL,
  `level_type` text NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `surname`, `middlename`, `email`, `phone_number`, `application_number`, `password`, `department`, `level_type`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Muqtar', 'Ajiboye', 'Oyetunji', 'muqtarajiboye@gmail.com', '', 'NDCOM/21/468', '$2y$10$PlX0RKY5f.5acc/gCl1LSONQ1v2ntGHUDKKq0Im88YfQU5ytmTBcW', '18', 'ND', 'student', '2025-12-05 05:00:56.910540', '2025-12-05 05:00:56.910540'),
(4, 'Lateef', 'Azeez', 'Oyelowo', 'maoty805@gmail.com', '', 'hdhbsd vx', '$2y$10$ayFepNrphWjP1mhudQvrl.8zuewxHSTCaooUiXVricpAXsbvJCsPq', '7', 'HND', 'student', '2025-12-05 08:12:11.383822', '2025-12-05 08:12:11.383822');

-- --------------------------------------------------------

--
-- Table structure for table `student_biodata`
--

CREATE TABLE `student_biodata` (
  `biodata_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `phone_number` text NOT NULL,
  `stateoforigin` text NOT NULL,
  `nin` text NOT NULL,
  `home_address` text NOT NULL,
  `date_of_birth` text NOT NULL,
  `gender` text NOT NULL,
  `lcda` text NOT NULL,
  `nextof_name` text NOT NULL,
  `nextof_email` text NOT NULL,
  `nextof_relationship` text NOT NULL,
  `nextof_phonenuber` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_biodata`
--

INSERT INTO `student_biodata` (`biodata_id`, `student_id`, `phone_number`, `stateoforigin`, `nin`, `home_address`, `date_of_birth`, `gender`, `lcda`, `nextof_name`, `nextof_email`, `nextof_relationship`, `nextof_phonenuber`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '09055015544', 'Ekiti', '12345678900', ' vbhj', '2025-12-06', 'Female', 'Atiba', 'Muqtar', 'muqtarajiboye@gmail.com', 'Father', '07058810695', 'final_submit', '2025-12-05 08:13:55', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_school`
--
ALTER TABLE `admin_school`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `jamb_details`
--
ALTER TABLE `jamb_details`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `olevel_details`
--
ALTER TABLE `olevel_details`
  ADD PRIMARY KEY (`olevel_id`);

--
-- Indexes for table `olevel_result`
--
ALTER TABLE `olevel_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `payment_record`
--
ALTER TABLE `payment_record`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_biodata`
--
ALTER TABLE `student_biodata`
  ADD PRIMARY KEY (`biodata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_school`
--
ALTER TABLE `admin_school`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jamb_details`
--
ALTER TABLE `jamb_details`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `olevel_details`
--
ALTER TABLE `olevel_details`
  MODIFY `olevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `olevel_result`
--
ALTER TABLE `olevel_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_record`
--
ALTER TABLE `payment_record`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_biodata`
--
ALTER TABLE `student_biodata`
  MODIFY `biodata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
