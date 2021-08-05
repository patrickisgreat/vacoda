<list-edit-import-categories :user="user" :team="team" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Edit Team Categories</div>
        <div class="panel-body">
            <!-- Success Message -->
            <div class="categories">

            </div>
            <!-- Update Button -->
            <div class="form-group">
                <div class="col-md-6">
                    {{--<button class="btn btn-primary"
                            @click.prevent="rename()"
                            :disabled="">

                        Rename
                    </button>
                    <button  class="btn btn-primary"
                             @click.prevent=""
                             :disabled="">

                        Add Category
                    </button>--}}
                    <button class="btn btn-primary"
                            @click.prevent="showModal('import')"
                            :disabled="">

                        Import
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Team Categories-->
    <div class="modal fade" id="modal-update-team-categories" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Categories Update Successful!
                    </h4>
                </div>
                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>
    <!-- Delete Team Category Modal -->
    <div class="modal fade" id="modal-delete-category" tabindex="-1" role="dialog">
        <div class="modal-dialog" v-if="deletingCategory">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Remove Category (@{{ deletingCategory.name  }})
                    </h4>
                </div>

                <div class="modal-body">
                    Are you sure you want to remove this Category ?
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                    <button type="button"
                            class="btn btn-danger"
                            @click="delete">
                    Yes, Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Import Team Category Modal -->
    <div class="modal fade" id="modal-import-categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/upload/categories" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Upload Categories</h4>
                        <p>Clicking "Upload File" will queue your spreadsheet for import. The import may take longer for larger spreadsheets.</p>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="spreadsheet">
                        <span class="help-block">
                            Select a CSV or XLS spreadsheet formatted as an adjacency list.
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-default"
                                data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit"
                                class="btn btn-primary offer-import">
                            Upload File
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</list-edit-import-categories>
