{if $save}
<div class="bootstrap">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Url</strong> saved
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
{/if}
<form action="" method="post">
  <div class="form-group">
    <label for="exampleUrl">Url</label>
    <input type="text" class="form-control" id="exampleUrl" name="exampleUrl" aria-describedby="urlHelp" placeholder="Enter url" value="{$urlValue}">
    <small id="urlHelp" class="form-text text-muted">We'll never share your .</small>
  </div>
  <button type="submit" name="submitMtrExample" class="btn btn-primary">Submit</button>
</form>