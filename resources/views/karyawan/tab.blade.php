<?php
function tab_active($url)
{
     echo Request::segment(3)==$url?'active':'';
}
?>


<nav class="navbar navbar-expand navbar-primary navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
     <li class="nav-item">
                          <a class="nav-link active" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i> Menu</a>
                        </li>
    <li class="nav-item d-none d-sm-inline-block">
      
      <a  href="/karyawan/{{ Request::segment(2) }}/edit" class= "nav-link {{ tab_active('edit') }}"><i class="fa fa-user" aria-hidden="true"></i> Edit</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a  href="/karyawan/{{ Request::segment(2) }}/polakerja" class= "nav-link {{ tab_active('polakerja') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Pola Kerja</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a  href="/karyawan/{{ Request::segment(2) }}/kehadiran" class= "nav-link {{ tab_active('kehadiran') }}"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Kehadiran</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a  href="/karyawan/{{ Request::segment(2) }}/lembur"class= "nav-link {{ tab_active('lembur') }}"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Lembur</a>
    </li>
   
  </ul>
</nav>
