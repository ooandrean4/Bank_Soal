
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
             <div class="card-header">
                
                <div class="pull-right">
                    <a href="<?=site_url('dashboard/add')?>" class="float-right btn btn-primary btn-flat" >
                        <i class="fa fa-user-plus"></i> Create
                    </a>
                </div>
                <div class="navbar-form">
                  <?php echo form_open('dashboard/search')?>
                    <input type="text" name="keyword" class="form-cntrol" placeholder="search">
                    <button type="submit" class="btn btn-success">Cari</button> 
                  <?php echo form_close()?>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                        <th style="width: 10px">no</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No HP</th>
                        <th>level</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;
                            foreach($row->result() as $key => $data) {
                        ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->nama?></td>
                                <td><?=$data->username?></td>
                                <td><?=$data->no_hp?></td>
                                <td> 
                                <?php if($data->level == 1) {?>
                                  admin
                                <?php } else if($data->level == 2){?>
                                  user
                                <?php } ?>
                                </td>
                                <td > 
                                <form action="<?=site_url('dashboard/del')?>" method="post">
                                  <a href="<?=site_url('dashboard/edit/').$data->id_user?>" class="btn btn-primary btn-xs">
                                      <i class="fa fa-pen"></i> Update
                                  </a>
                                  <input type="hidden" name="id_user" value="<?=$data->id_user?>">
                                  <button onclick="return confirm('Apakah Anda Yakin')" class="btn btn-danger btn-xs">
                                      <i class="fa fa-trash"></i> Hapus
                                  </button>
                                </form>
                               
                                </td>
                            </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
                <div class="card-footer">
                <a href="<?=site_url('dashboard/print')?>" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <a href="<?=site_url('dashboard/laporanpdf/')?>" class="btn btn-default"><i class="fas fa-print"></i> EXPERT PDF</a>
                <a href="<?=site_url('dashboard/loaddata')?>" class="btn btn-default"><i class="fas fa-download"></i> data json</a>             
                </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
 