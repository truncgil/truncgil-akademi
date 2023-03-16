<?php function levels() {
    // user no, full control, write, read, modify
    return [
    'Admin' =>                          [1,1,1,1,1],
        'Manager (Center Office)' =>    [2,0,1,1,1],
        'Manager (QC)' =>               [2,0,1,1,0],
        'Manager (PTO)' =>              [2,0,1,1,0],
        'Manager (Lead)' =>             [2,0,1,1,0],
        'Welder (Subcontractor)' =>     [4,0,1,1,0],
        'Painter (Subcontractor)' =>    [5,0,1,1,0],
        'Insulator (Subcontractor)' =>          [6,0,1,1,0],
        'Welder, Painter, Insulator (Subcontractor / Payrollless)' =>   [7,0,1,1,0],
        'Quality Staff' =>                                              [8,0,1,1,1],
        'Document Staff' =>                                             [9,0,1,1,1],
        'Field Staff' =>                                                [10,0,1,1,1],
    ];
} 

function level_keys() {
    return array_keys(levels());
}