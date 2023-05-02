<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VersionOne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP TABLE IF EXISTS `orders`;
        CREATE TABLE `orders` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `order_number` varchar(100) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `area_code` int(10) NOT NULL,
  `package_size` double(10,2) NOT NULL,
  `package_weight` double(20,5) NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contact` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'hand over person',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `vessels`;
CREATE TABLE `vessels` (
  `type` enum('car,pickup,trailer') CHARACTER SET latin1 NOT NULL,
  `reg_number` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `driver` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `capacity` int(10) unsigned NOT NULL COMMENT 'in tons',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `vessel_trip_packages`;
CREATE TABLE `vessel_trip_packages` (
  `vessel_id` int(11) NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `trip_number` int(11) NOT NULL,
  `trip_date` date NOT NULL,
  KEY `vessel_id` (`vessel_id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `vessel_trip_packages_ibfk_1` FOREIGN KEY (`vessel_id`) REFERENCES `vessels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vessel_trip_packages_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
