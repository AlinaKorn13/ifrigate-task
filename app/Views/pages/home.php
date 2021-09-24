<div class="row">
  	<div class="col">
  		<h2>Перечень плановых проверок</h2>
  	</div>
</div>
<div class="row">
  	<div class="col">
  		<form action="" >
  			<div class="row">
  				<div class="col">
		  			<div class="form-group">
		  				<label for="">Наименование СМП</label>
				    	<input class="form-control" type="search" name="title" placeholder="Поиск по наименованию" aria-label="Search" value="<?= $searchParams['title'] ?? ''?>">
					  </div>
				  </div>
				</div>
				<div class="row">
					<div class="col">
				    <div class="form-group">
				    	<label for="organ">Контролирующий орган</label>
				    	<select class="form-control authority input-lg" name="authority" id="organ">
				    		<?php foreach ($auth_list as $item): ?>
				    			<option value="<?= esc($item['id']) ?>" <?= (isset($searchParams['authority']) && $item['id'] == $searchParams['authority']) ? 'selected' : '' ?>><?= esc($item['title']) ?></option>
				    		<?php endforeach; ?>
				    	</select>
				    </div>
			    </div>
			    <div class="col">
				    <div class="form-group">
					    <label for="period">Период</label>
					    <div class="input-group">
							  <input type="text" class="form-control datepicker-here" autocomplete="off" name="date_from" data-date-format="dd/mm/yyyy" placeholder="ДД/ММ/ГГГГ" value="<?= (isset($searchParams['date_from']) && !empty($searchParams['date_from'])) ? date("d/m/Y", strtotime(esc($searchParams['date_from']))) : '' ?>">
							  <input type="text" class="form-control datepicker-here" autocomplete="off" data-date-format="dd/mm/yyyy" name="date_to" placeholder="ДД/ММ/ГГГГ" value="<?= (isset($searchParams['date_to']) && !empty($searchParams['date_to'])) ? date("d/m/Y", strtotime(esc($searchParams['date_to']))) : '' ?>">
							</div>
				    </div>
			    </div>
		    </div>
		    <div class="form-group">
			    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
			    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Сбросить</button>
			  </div>
  		</form>
  	</div>
</div>
<div class="row">
	<div class="col">
		<button type="button" class="btn btn-secondary float-right ml-2" data-toggle="modal" data-target="#modalCreate">Добавить</button>
		<div class="btn-group float-right" role="group" aria-label="Basic example">
		  <button type="button" class="btn btn btn-outline-success disabled">Экспорт в xls</button>
		  <button type="button" class="btn btn-success disabled">Импорт из xls</button>
		</div>
  </div>
</div>
<div class="row mt-2">
	<div class="col">
		<?php if (!empty($list) && is_array($list)) : ?>
			<table class="table table-responsive">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Проверяемый СМП</th>
			      <th scope="col">Контролирующий орган</th>
			      <th scope="col">Плановый период проверки</th>
			      <th scope="col">Плановая длительность</th>
			      <th scope="col">Действие</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach ($list as $item): ?>
			    	<tr>
				      <th scope="row"><?= esc($item['id']);?></th>
				      <td><?= esc($item['title']) ?></td>
				      <td><?= esc($item['authority_name']) ?></td>
				      <td><?= date("d.m.Y", strtotime(esc($item['date_from']))) ?>-<?= date("d.m.Y", strtotime(esc($item['date_to']))) ?></td>
				      <td><?= esc($item['duration']) ?></td>
				      <td>
				        <button type="button" class="btn btn-success btn-sm edit" data-toggle="modal" data-target="#modalUpdate" data-id="<?= esc($item['id']);?>">Редактировать</button>
								<a href="/pages/delete/<?= esc($item['id']);?>" class="btn btn-danger btn-sm" data-id="<?= esc($item['id']);?>">Удалить</a>
					  	</td>
				    </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>
		<?php else : ?>
			<div class="alert alert-dark" role="alert">
			  Записи не найдены.
			</div>
		<?php endif ?>
	</div>
</div>
