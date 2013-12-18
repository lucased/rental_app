<div class="row">
    <div class="col-lg-12">
        <h3><?= $title ?></h3>
    </div>
</div>

<hr>

<!-- Example row of columns -->

<div id="items">
    <div class="row well">
        <div class="col-lg-1">
            <!-- <button type="button" class="btn btn-primary">Add Item</button> -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary">Add Item</a>
        </div>
        <div class="col-lg-4">
            <div class="input-group input-group-lg=md">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input type="text" class="form-control input-md search" placeholder="Search Items">
            </div>
        </div>
    </div>
    <?php if (!empty($status)) : ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <? echo $status ?>
        </div>

    <? endif ?>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" accept-charset="utf-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID#</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Week Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach ($items as $item ): ?>
                        <tr>
                            <td class="id"><?= $item->id ?></td>
                            <td class="name"><?= $item->pName ?></td>
                            <td class="category"><?= $item->category ?></td>
                            <td class="stock"><?= $item->stock ?></td>
                            <td class="weekprice">$<?= $item->week_price ?></td>
                            <td><a data-toggle="modal" id="<?php echo $item->id ?>" href="#editModal" class="btn btn-primary btn-xs">EDIT</a>
                                <a href="index.php?action=delete&id=<?php echo $item->id ?>" class="btn btn-danger btn-xs">DELETE</a></td>
                        </tr>
                    <? endforeach ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>

</div> <!-- end div items -->

<hr>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">


                    <form method="post" role="form">
                        <div class="form-group col-lg-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"  id="name" placeholder="Enter product name">
                            <input type="hidden" name="add" id="item-id">
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="description">Descripton</label>
                            <textarea class="form-control" name="description" rows="2"></textarea>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <option>Select..</option>
                                <?php foreach($categories as $category) : ?>
                                    <option><?php echo $category->category ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="stock">Stock#</label>
                            <input type="number" class="form-control" name="stock" id="stock">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="stock">Asset Number</label>
                            <input type="number" class="form-control" name="asset_number" id="asset_number">
                        </div>

                        <hr>

                        <h4 class="modal-header">Price</h4>

                        <div class="input-group col-lg-3">
                            <label for="week">Week</label>
                            <input type="number" class="form-control" name="week_price" id="week" placeholder="$">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="month">Month</label>
                            <input type="number" class="form-control" name="month_price" id="month" placeholder="$">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="3month">3 Month</label>
                            <input type="number" class="form-control" name="three_month_price" id="3month" placeholder="$">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">


                    <form method="post" role="form">
                        <div class="form-group col-lg-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"  id="name" placeholder="Enter product name">
                            <input type="hidden" name="update" id="item-id">
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="description">Descripton</label>
                            <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option>Select..</option>
                                <?php foreach($categories as $category) : ?>
                                    <option><?php echo $category->category ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="stock">Stock#</label>
                            <input type="number" class="form-control" name="stock" id="stock">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="stock">Asset Number</label>
                            <input type="number" class="form-control" name="asset_number" id="asset_number">
                        </div>

                        <hr>

                        <h4 class="modal-header">Price</h4>

                        <div class="input-group col-lg-3">
                            <label for="week">Week</label>
                            <input type="number" class="form-control" name="week_price" id="week" placeholder="$">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="month">Month</label>
                            <input type="number" class="form-control" name="month_price" id="month" placeholder="$">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="3month">3 Month</label>
                            <input type="number" class="form-control" name="three_month_price" id="three_month" placeholder="$">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->