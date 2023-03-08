<?php 
use Illuminate\Support\Facades\Schema;
function table_columns($tableName) {
    $exceptsColumns = ['created_at', 'updated_at'];
    $columnNames = array_diff(Schema::getColumnListing($tableName), $exceptsColumns);
    return $columnNames;
} ?>