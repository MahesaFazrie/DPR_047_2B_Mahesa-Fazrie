CREATE TYPE "role_pengguna" AS ENUM (
  'Admin',
  'Public'
);

CREATE TYPE "jabatan_anggota" AS ENUM (
  'Ketua',
  'Wakil Ketua',
  'Anggota'
);

CREATE TYPE "status_pernikahan" AS ENUM (
  'Kawin',
  'Belum Kawin',
  'Cerai Hidup',
  'Cerai Mati'
);

CREATE TYPE "kategori_komponen" AS ENUM (
  'Gaji Pokok',
  'Tunjangan Melekat',
  'Tunjangan Lain'
);

CREATE TYPE "jabatan_komponen" AS ENUM (
  'Ketua',
  'Wakil Ketua',
  'Anggota',
  'Semua'
);

CREATE TYPE "satuan_komponen" AS ENUM (
  'Bulan',
  'Hari',
  'Periode'
);

CREATE TABLE "pengguna" (
  "id_pengguna" bigint PRIMARY KEY,
  "username" varchar(15) UNIQUE NOT NULL,
  "password" varchar(128) NOT NULL,
  "email" varchar(255) UNIQUE NOT NULL,
  "nama_depan" varchar(100) NOT NULL,
  "nama_belakang" varchar(100) NOT NULL,
  "role" role_pengguna
);

CREATE TABLE "anggota" (
  "id_anggota" bigint PRIMARY KEY,
  "nama_depan" varchar(100) NOT NULL,
  "nama_belakang" varchar(100) NOT NULL,
  "gelar_depan" varchar(50),
  "gelar_belakang" varchar(50),
  "jabatan" jabatan_anggota,
  "status_pernikahan" status_pernikahan
);

CREATE TABLE "komponen_gaji" (
  "id_komponen_gaji" bigint PRIMARY KEY,
  "nama_komponen" varchar(100) NOT NULL,
  "kategori" kategori_komponen,
  "jabatan" jabatan_komponen,
  "nominal" numeric(17,2) NOT NULL,
  "satuan" satuan_komponen NOT NULL
);

CREATE TABLE "penggajian" (
  "id_komponen_gaji" bigint,
  "id_anggota" bigint,
  PRIMARY KEY ("id_komponen_gaji", "id_anggota")
);

COMMENT ON COLUMN "pengguna"."password" IS 'Hashed Password';

ALTER TABLE "penggajian" ADD FOREIGN KEY ("id_anggota") REFERENCES "anggota" ("id_anggota");

ALTER TABLE "penggajian" ADD FOREIGN KEY ("id_komponen_gaji") REFERENCES "komponen_gaji" ("id_komponen_gaji");
