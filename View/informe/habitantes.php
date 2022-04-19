<div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-yellow">
              <th>Residente</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($habitantes as $habitante) :
            ?>
              <tr>
                <td><?php echo ucwords($habitante->fullname) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr class="bg-yellow">
              <th>Residente</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>