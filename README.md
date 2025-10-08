<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.idarah.com/wp-content/uploads/2022/01/1585047x618626.png" width="200" alt="Logo Idarah"></a></p>

## Tentang Idarah

Idarah adalah satu sistem yang dibangunkan oleh Jabatan IT PAS Negeri Sembilan (JITPN9) yang mempunyai fungsi-fungsi berikut:

- Senarai ahli PAS Negeri Sembilan
- Senarai organisasi dalam PAS Negeri Sembilan:
  - Badan Perhubungan Negeri
  - Dewan-dewan Negeri
  - Lajnah-lajnah peringkat Negeri
  - PAS Kawasan
  - Dewan-dewan Kawasan
  - PAS Cawangan
- Direktori AJK
- Taqwim program
- Laporan kewangan
- Laporan program

## Kategori Pengguna

Sistem idarah mempunyai kategori pengguna (_user roles_) seperti berikut:

| No. | Role | Keterangan|Permission|
|-----|------|-----------|----------|
|1.  | superadmin|Pembangun sistem ini |create_org, assign_admin|
|2.  |admin|Setiausaha setiap organisasi|add_user, assign_approver, assign_treasurer, remove_user, revoke_approver, revoke_treasurer, add_minutes, add_event|
|3.  |approver|Ketua setiap organisasi|approve_minutes, approve_cashflow|
|4.  |treasurer|Bendahari setiap organisasi|add_cashflow|
|5.  |user|AJK biasa|view_minutes, view_cashflow, view_event|

Untuk fungsi ini, sistem ini menggunakan package spatie/laravel dengan fungsi tenant diaktifkan.

## Stack digunakan

- php: versi 8.2 ke atas
- filament: versi 4.1 ke atas
- laravel: versi 12.0
- tinker: versi 2.10.1
