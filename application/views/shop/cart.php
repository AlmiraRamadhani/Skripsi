<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered table-stripped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Product</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
                    foreach ($this->cart->contents() as $items) : ?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $items['name']; ?></td>
						<td><?= $items['qty']; ?></td>
						<td align="right"><?= number_format($items['price'], 0, ',', '.'); ?></td>
						<td align="right"><?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
					</tr>
					<?php $i++;
                    endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td align="right" colspan="4">Total </td>
						<td align="right"><?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
					</tr>
				</tfoot>
			</table>
			<div style="text-align: center;">
				<a href="<?= base_url('shop/clear_cart'); ?>" class="btn btn-danger">Clear Cart</a>
				<a href="<?= base_url('shop'); ?>" class="btn btn-primary">Continue Shopping</a>
				<a href="<?= base_url('order'); ?>" class="btn btn-success">Checkout</a>
			</div>
		</div>
	</div>
</div>

<br><br><br><br><br><br><br><br><br><br>
