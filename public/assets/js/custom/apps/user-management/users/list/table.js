"use strict";

var KTLevelList = function() {
    var e, t, n, r;
    var tableElement = document.getElementById("kt_table_level");

    // Fungsi untuk mengelola tindakan penghapusan baris
    var handleRowDeletion = function() {
        tableElement.querySelectorAll('[data-kt-level-table-filter="delete_row"]').forEach((button) => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                var row = event.target.closest("tr");
                var levelName = row.querySelector("td:nth-child(3)").innerText;
                var id = row.querySelector("td:nth-child(2)").innerText;

                // Membuat dan menampilkan kotak dialog konfirmasi
                Swal.fire({
                    text: `Are you sure you want to delete level ${levelName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Mengirim permintaan POST untuk menghapus level
                        var form = document.getElementById(`delete-form-${id}`);
                        form.submit();

                        // Tampilkan notifikasi sukses jika permintaan berhasil
                        Swal.fire({
                            text: `You have deleted level ${levelName}!`,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(function() {
                            // Menghapus baris dari DataTable
                            e.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Menampilkan notifikasi bahwa penghapusan dibatalkan
                        Swal.fire({
                            text: `${levelName} was not deleted.`,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });
    };

    var handleToolbar = function() {
        var checkboxes = document.querySelectorAll('#kt_table_level [type="checkbox"]');
        var t = document.querySelector('[data-kt-level-table-toolbar="base"]');
        var n = document.querySelector('[data-kt-level-table-toolbar="selected"]');
        var r = document.querySelector('[data-kt-level-table-select="selected_count"]');
        var selectedIdInput = document.getElementById('selected-ids');
        var form = document.getElementById("delete-selected-form");
        var deleteSelectedButton = document.querySelector('[data-kt-level-table-select="delete_selected"]');
        var selectAllCheckbox = document.querySelector('[data-kt-check-target="#kt_table_level .form-check-input"]');
        var selectedIds = [];
    
        function updateToolbar() {
            r.innerText = selectedIds.length;
            t.classList.toggle("d-none", selectedIds.length > 0);
            n.classList.toggle("d-none", selectedIds.length === 0);
        }
    
        function updateSelectedIds(checkbox, isChecked) {
            if (isChecked) {
                if (!selectedIds.includes(checkbox.value)) {
                    selectedIds.push(checkbox.value);
                }
            } else {
                selectedIds = selectedIds.filter(id => id !== checkbox.value && id !== 'on');
            }
            updateToolbar();
        }
    
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {
                updateSelectedIds(checkbox, checkbox.checked);
                if (checkbox.checked && checkbox === selectAllCheckbox) {
                    checkboxes.forEach(cb => cb.checked = checkbox.checked);
                }
            });
        });
    
        selectAllCheckbox.addEventListener("change", function() {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
                updateSelectedIds(checkbox, checkbox.checked);
            });
        });
    
        deleteSelectedButton.addEventListener("click", function(event) {
            event.preventDefault();
            if (selectedIds.length === 0) {
                Swal.fire({
                    text: "No levels were selected for deletion.",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
                return;
            }
            Swal.fire({
                text: "Are you sure you want to delete selected levels?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    selectedIds = selectedIds.filter(id => id !== 'on');
                    console.log('selectedIds before form submission:', selectedIds);
                    selectedIdInput.value = JSON.stringify(selectedIds);
                    form.submit();
                    Swal.fire({
                        text: "You have deleted all selected levels!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    });
                }
            });
        });
    };    

    // Fungsi untuk memperbarui toolbar
    var updateToolbar = function() {
        var checkboxes = tableElement.querySelectorAll('tbody [type="checkbox"]');
        var hasSelected = false;
        var selectedCount = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                hasSelected = true;
                selectedCount++;
            }
        });

        if (hasSelected) {
            r.innerText = selectedCount;
            t.classList.add("d-none");
            n.classList.remove("d-none");
        } else {
            t.classList.remove("d-none");
            n.classList.add("d-none");
        }
    };

    // Fungsi untuk menangani pencarian dan reset
    var handleSearchAndReset = function() {
        document.querySelector('[data-kt-level-table-filter="search"]').addEventListener("keyup", function(event) {
            e.search(event.target.value).draw();
        });

        document.querySelector('[data-kt-level-table-filter="reset"]').addEventListener("click", function() {
            document.querySelector('[data-kt-level-table-filter="form"]').querySelectorAll("select").forEach((select) => {
                $(select).val("").trigger("change");
            });
            e.search("").draw();
        });
    };

    return {
        init: function() {
            if (tableElement) {
                e = $(tableElement).DataTable({
                    info: false,
                    order: [],
                    pageLength: 10,
                    lengthChange: false,
                    columnDefs: [
                        { orderable: false, targets: 0 },
                        { orderable: false, targets: 4 }
                    ]
                }).on("draw", function() {
                    handleToolbar();
                    handleRowDeletion();
                    updateToolbar();
                });

                handleToolbar();
                handleRowDeletion();
                handleSearchAndReset();
            }
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTLevelList.init();
});

var KTkksList = function() {
    var e, t, n, r;
    var tableElement = document.getElementById("kt_table_user");

    // Fungsi untuk mengelola tindakan penghapusan baris
    var handleRowDeletion = function() {
        tableElement.querySelectorAll('[data-kt-user-table-filter="delete_row"]').forEach((button) => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                var row = event.target.closest("tr");
                var userName = row.querySelector("td:nth-child(3)").innerText;
                var id = row.querySelector("td:nth-child(2)").innerText;

                // Membuat dan menampilkan kotak dialog konfirmasi
                Swal.fire({
                    text: `Are you sure you want to delete user ${userName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Mengirim permintaan POST untuk menghapus user
                        var form = document.getElementById(`delete-form-${id}`);
                        form.submit();

                        // Tampilkan notifikasi sukses jika permintaan berhasil
                        Swal.fire({
                            text: `You have deleted user ${userName}!`,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(function() {
                            // Menghapus baris dari DataTable
                            e.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Menampilkan notifikasi bahwa penghapusan dibatalkan
                        Swal.fire({
                            text: `${userName} was not deleted.`,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });
    };

    var handleToolbar = function() {
        var checkboxes = document.querySelectorAll('#kt_table_user [type="checkbox"]');
        var t = document.querySelector('[data-kt-user-table-toolbar="base"]');
        var n = document.querySelector('[data-kt-user-table-toolbar="selected"]');
        var r = document.querySelector('[data-kt-user-table-select="selected_count"]');
        var selectedIdInput = document.getElementById('selected-ids');
        var form = document.getElementById("delete-selected-form");
        var deleteSelectedButton = document.querySelector('[data-kt-user-table-select="delete_selected"]');
        var selectAllCheckbox = document.querySelector('[data-kt-check-target="#kt_table_user .form-check-input"]');
        var selectedIds = [];
    
        function updateToolbar() {
            r.innerText = selectedIds.length;
            t.classList.toggle("d-none", selectedIds.length > 0);
            n.classList.toggle("d-none", selectedIds.length === 0);
        }
    
        function updateSelectedIds(checkbox, isChecked) {
            if (isChecked) {
                if (!selectedIds.includes(checkbox.value)) {
                    selectedIds.push(checkbox.value);
                }
            } else {
                selectedIds = selectedIds.filter(id => id !== checkbox.value && id !== 'on');
            }
            updateToolbar();
        }
    
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {
                updateSelectedIds(checkbox, checkbox.checked);
                if (checkbox.checked && checkbox === selectAllCheckbox) {
                    checkboxes.forEach(cb => cb.checked = checkbox.checked);
                }
            });
        });
    
        selectAllCheckbox.addEventListener("change", function() {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
                updateSelectedIds(checkbox, checkbox.checked);
            });
        });
    
        deleteSelectedButton.addEventListener("click", function(event) {
            event.preventDefault();
            if (selectedIds.length === 0) {
                Swal.fire({
                    text: "No users were selected for deletion.",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
                return;
            }
            Swal.fire({
                text: "Are you sure you want to delete selected users?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    selectedIds = selectedIds.filter(id => id !== 'on');
                    console.log('selectedIds before form submission:', selectedIds);
                    selectedIdInput.value = JSON.stringify(selectedIds);
                    form.submit();
                    Swal.fire({
                        text: "You have deleted all selected users!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    });
                }
            });
        });
    };    

    // Fungsi untuk memperbarui toolbar
    var updateToolbar = function() {
        var checkboxes = tableElement.querySelectorAll('tbody [type="checkbox"]');
        var hasSelected = false;
        var selectedCount = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                hasSelected = true;
                selectedCount++;
            }
        });

        if (hasSelected) {
            r.innerText = selectedCount;
            t.classList.add("d-none");
            n.classList.remove("d-none");
        } else {
            t.classList.remove("d-none");
            n.classList.add("d-none");
        }
    };

    // Fungsi untuk menangani pencarian dan reset
    var handleSearchAndReset = function() {
        document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", function(event) {
            e.search(event.target.value).draw();
        });

        document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", function() {
            document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((select) => {
                $(select).val("").trigger("change");
            });
            e.search("").draw();
        });
    };

    return {
        init: function() {
            if (tableElement) {
                e = $(tableElement).DataTable({
                    info: false,
                    order: [],
                    pageLength: 10,
                    lengthChange: false,
                    columnDefs: [
                        { orderable: false, targets: 0 },
                        { orderable: false, targets: 4 }
                    ]
                }).on("draw", function() {
                    handleToolbar();
                    handleRowDeletion();
                    updateToolbar();
                });

                handleToolbar();
                handleRowDeletion();
                handleSearchAndReset();
            }
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTUsersList.init();
});

var KTWargaList = function() {
    var e, t, n, r;
    var tableElement = document.getElementById("kt_table_warga");

    // Fungsi untuk mengelola tindakan penghapusan baris
    var handleRowDeletion = function() {
        tableElement.querySelectorAll('[data-kt-warga-table-filter="delete_row"]').forEach((button) => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                var row = event.target.closest("tr");
                var userName = row.querySelector("td:nth-child(3)").innerText;
                var id = row.querySelector("td:nth-child(2)").innerText;

                // Membuat dan menampilkan kotak dialog konfirmasi
                Swal.fire({
                    text: `Are you sure you want to delete user ${userName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Mengirim permintaan POST untuk menghapus user
                        var form = document.getElementById(`delete-form-${id}`);
                        form.submit();

                        // Tampilkan notifikasi sukses jika permintaan berhasil
                        Swal.fire({
                            text: `You have deleted user ${userName}!`,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(function() {
                            // Menghapus baris dari DataTable
                            e.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Menampilkan notifikasi bahwa penghapusan dibatalkan
                        Swal.fire({
                            text: `${userName} was not deleted.`,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });
    };

    var handleToolbar = function() {
        var checkboxes = document.querySelectorAll('#kt_table_warga [type="checkbox"]');
        var t = document.querySelector('[data-kt-warga-table-toolbar="base"]');
        var n = document.querySelector('[data-kt-warga-table-toolbar="selected"]');
        var r = document.querySelector('[data-kt-warga-table-select="selected_count"]');
        var selectedIdInput = document.getElementById('selected-ids');
        var form = document.getElementById("delete-selected-form");
        var deleteSelectedButton = document.querySelector('[data-kt-warga-table-select="delete_selected"]');
        var selectAllCheckbox = document.querySelector('[data-kt-check-target="#kt_table_warga .form-check-input"]');
        var selectedIds = [];
    
        function updateToolbar() {
            r.innerText = selectedIds.length;
            t.classList.toggle("d-none", selectedIds.length > 0);
            n.classList.toggle("d-none", selectedIds.length === 0);
        }
    
        function updateSelectedIds(checkbox, isChecked) {
            if (isChecked) {
                if (!selectedIds.includes(checkbox.value)) {
                    selectedIds.push(checkbox.value);
                }
            } else {
                selectedIds = selectedIds.filter(id => id !== checkbox.value && id !== 'on');
            }
            updateToolbar();
        }
    
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {
                updateSelectedIds(checkbox, checkbox.checked);
                if (checkbox.checked && checkbox === selectAllCheckbox) {
                    checkboxes.forEach(cb => cb.checked = checkbox.checked);
                }
            });
        });
    
        selectAllCheckbox.addEventListener("change", function() {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
                updateSelectedIds(checkbox, checkbox.checked);
            });
        });
    
        deleteSelectedButton.addEventListener("click", function(event) {
            event.preventDefault();
            if (selectedIds.length === 0) {
                Swal.fire({
                    text: "No users were selected for deletion.",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
                return;
            }
            Swal.fire({
                text: "Are you sure you want to delete selected users?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    selectedIds = selectedIds.filter(id => id !== 'on');
                    console.log('selectedIds before form submission:', selectedIds);
                    selectedIdInput.value = JSON.stringify(selectedIds);
                    form.submit();
                    Swal.fire({
                        text: "You have deleted all selected users!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    });
                }
            });
        });
    };    

    // Fungsi untuk memperbarui toolbar
    var updateToolbar = function() {
        var checkboxes = tableElement.querySelectorAll('tbody [type="checkbox"]');
        var hasSelected = false;
        var selectedCount = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                hasSelected = true;
                selectedCount++;
            }
        });

        if (hasSelected) {
            r.innerText = selectedCount;
            t.classList.add("d-none");
            n.classList.remove("d-none");
        } else {
            t.classList.remove("d-none");
            n.classList.add("d-none");
        }
    };

    // Fungsi untuk menangani pencarian dan reset
    var handleSearchAndReset = function() {
        document.querySelector('[data-kt-warga-table-filter="search"]').addEventListener("keyup", function(event) {
            e.search(event.target.value).draw();
        });

        document.querySelector('[data-kt-warga-table-filter="reset"]').addEventListener("click", function() {
            document.querySelector('[data-kt-warga-table-filter="form"]').querySelectorAll("select").forEach((select) => {
                $(select).val("").trigger("change");
            });
            e.search("").draw();
        });
    };

    return {
        init: function() {
            if (tableElement) {
                e = $(tableElement).DataTable({
                    info: false,
                    order: [],
                    pageLength: 10,
                    lengthChange: false,
                    columnDefs: [
                        { orderable: false, targets: 0 },
                        { orderable: false, targets: 4 }
                    ]
                }).on("draw", function() {
                    handleToolbar();
                    handleRowDeletion();
                    updateToolbar();
                });

                handleToolbar();
                handleRowDeletion();
                handleSearchAndReset();
            }
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTWargaList.init();
});

var KTKKList = function() {
    var e, t, n, r;
    var tableElement = document.getElementById("kt_table_kk");

    // Fungsi untuk mengelola tindakan penghapusan baris
    var handleRowDeletion = function() {
        tableElement.querySelectorAll('[data-kt-kk-table-filter="delete_row"]').forEach((button) => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                var row = event.target.closest("tr");
                var userName = row.querySelector("td:nth-child(3)").innerText;
                var id = row.querySelector("td:nth-child(2)").innerText;

                // Membuat dan menampilkan kotak dialog konfirmasi
                Swal.fire({
                    text: `Are you sure you want to delete user ${userName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Mengirim permintaan POST untuk menghapus user
                        var form = document.getElementById(`delete-form-${id}`);
                        form.submit();

                        // Tampilkan notifikasi sukses jika permintaan berhasil
                        Swal.fire({
                            text: `You have deleted user ${userName}!`,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then(function() {
                            // Menghapus baris dari DataTable
                            e.row($(row)).remove().draw();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Menampilkan notifikasi bahwa penghapusan dibatalkan
                        Swal.fire({
                            text: `${userName} was not deleted.`,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });
    };

    var handleToolbar = function() {
        var checkboxes = document.querySelectorAll('#kt_table_kk [type="checkbox"]');
        var t = document.querySelector('[data-kt-kk-table-toolbar="base"]');
        var n = document.querySelector('[data-kt-kk-table-toolbar="selected"]');
        var r = document.querySelector('[data-kt-kk-table-select="selected_count"]');
        var selectedIdInput = document.getElementById('selected-ids');
        var form = document.getElementById("delete-selected-form");
        var deleteSelectedButton = document.querySelector('[data-kt-kk-table-select="delete_selected"]');
        var selectAllCheckbox = document.querySelector('[data-kt-check-target="#kt_table_kk .form-check-input"]');
        var selectedIds = [];
    
        function updateToolbar() {
            r.innerText = selectedIds.length;
            t.classList.toggle("d-none", selectedIds.length > 0);
            n.classList.toggle("d-none", selectedIds.length === 0);
        }
    
        function updateSelectedIds(checkbox, isChecked) {
            if (isChecked) {
                if (!selectedIds.includes(checkbox.value)) {
                    selectedIds.push(checkbox.value);
                }
            } else {
                selectedIds = selectedIds.filter(id => id !== checkbox.value && id !== 'on');
            }
            updateToolbar();
        }
    
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {
                updateSelectedIds(checkbox, checkbox.checked);
                if (checkbox.checked && checkbox === selectAllCheckbox) {
                    checkboxes.forEach(cb => cb.checked = checkbox.checked);
                }
            });
        });
    
        selectAllCheckbox.addEventListener("change", function() {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
                updateSelectedIds(checkbox, checkbox.checked);
            });
        });
    
        deleteSelectedButton.addEventListener("click", function(event) {
            event.preventDefault();
            if (selectedIds.length === 0) {
                Swal.fire({
                    text: "No users were selected for deletion.",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
                return;
            }
            Swal.fire({
                text: "Are you sure you want to delete selected users?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    selectedIds = selectedIds.filter(id => id !== 'on');
                    console.log('selectedIds before form submission:', selectedIds);
                    selectedIdInput.value = JSON.stringify(selectedIds);
                    form.submit();
                    Swal.fire({
                        text: "You have deleted all selected users!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    });
                }
            });
        });
    };    

    // Fungsi untuk memperbarui toolbar
    var updateToolbar = function() {
        var checkboxes = tableElement.querySelectorAll('tbody [type="checkbox"]');
        var hasSelected = false;
        var selectedCount = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                hasSelected = true;
                selectedCount++;
            }
        });

        if (hasSelected) {
            r.innerText = selectedCount;
            t.classList.add("d-none");
            n.classList.remove("d-none");
        } else {
            t.classList.remove("d-none");
            n.classList.add("d-none");
        }
    };

    // Fungsi untuk menangani pencarian dan reset
    var handleSearchAndReset = function() {
        document.querySelector('[data-kt-kk-table-filter="search"]').addEventListener("keyup", function(event) {
            e.search(event.target.value).draw();
        });

        document.querySelector('[data-kt-kk-table-filter="reset"]').addEventListener("click", function() {
            document.querySelector('[data-kt-kk-table-filter="form"]').querySelectorAll("select").forEach((select) => {
                $(select).val("").trigger("change");
            });
            e.search("").draw();
        });
    };

    return {
        init: function() {
            if (tableElement) {
                e = $(tableElement).DataTable({
                    info: false,
                    order: [],
                    pageLength: 10,
                    lengthChange: false,
                    columnDefs: [
                        { orderable: false, targets: 0 },
                        { orderable: false, targets: 4 },
                        { orderable: false, targets: 7 }
                    ]
                }).on("draw", function() {
                    handleToolbar();
                    handleRowDeletion();
                    updateToolbar();
                });

                handleToolbar();
                handleRowDeletion();
                handleSearchAndReset();
            }
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTKKList.init();
});
