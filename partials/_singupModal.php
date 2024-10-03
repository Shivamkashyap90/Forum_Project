<!-- Modal -->
<div class="modal fade" id="singupModal" tabindex="-1" aria-labelledby="singupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h1 class="modal-title fs-5" id="singupModalLabel">SingUp for an iForum Acount</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum_project/partials/_handleSingup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="singnupEmail" class="form-label">Username</label>
                        <input type="text" class="form-control" id="singnupEmail" name="singnupEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="singupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="singupPassword" name="singupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="singupcPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="singupcPassword" name="singupcPassword">
                    </div>

                    <button type="submit" class="btn btn-primary">SingUp</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>