/**
 * Entrepreneur
 */

/**
 * News Management (jquery)
 */

'use strict';

// Jalankan kode setelah halaman dimuat sepenuhnya
$(function () {
  var dt_ajax_table = $('.entrepreneur'),
    select2 = $('.select2'),
    modalnya = $('#modalEditData');

  if (select2.length) {
    var $this = select2;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Country',
      dropdownParent: $this.parent()
    });
  }
  // Inisialisasi DataTables untuk data pengguna
  // --------------------------------------------------------------------

  // ajax setup
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  if (dt_ajax_table.length) {
    // Menginisialisasi DataTables dengan konfigurasi tertentu
    var dt_ajax = dt_ajax_table.DataTable({
      processing: true, // Menampilkan pesan "Processing..." selama pengolahan data
      serverSide: true,
      ajax: {
        url: baseUrl + 'data-finance'
      },
      //Definisikan data yang diambil dari sumber json
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'needs_income' },
        { data: 'price_income' },
        { data: 'needs_spend' },
        { data: 'price_spend' },
        { data: 'description' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Checkboxes
          targets: 0,
          orderable: false,
          render: function render(data, type, full, meta) {
            var $idnya = full['id'];
            return '<input type="checkbox" class="dt-checkboxes form-check-input" data-id="' + $idnya + '">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          },
          responsivePriority: 4
        },
        {
          searchable: false,
          orderable: false,
          targets: 1,
          render: function render(data, type, full, meta) {
            return '<span>'.concat(full.fake_id, '</span>');
          }
        },
        {
          // news needs_income
          targets: 2,
          render: function render(data, type, full, meta) {
            var $needs_income = full['needs_income'];
            return $needs_income !== null ? '<span class="news-needs_income">' + $needs_income + '</span>' : '-';
          }
        },
        {
          // news price_income
          targets: 3,
          render: function render(data, type, full, meta) {
            var $price_income = full['price_income'];
            return $price_income !== null ? '<span class="news-price_income">' + $price_income + '</span>' : '-';
          }
        },
        {
          // news needs_spend
          targets: 4,
          render: function render(data, type, full, meta) {
            var $needs_spend = full['needs_spend'];
            return $needs_spend !== null ? '<span class="news-needs_spend">' + $needs_spend + '</span>' : '-';
          }
        },
        {
          // news price_spend
          targets: 5, // Perhatikan perubahan indeks ini menjadi 6
          render: function render(data, type, full, meta) {
            var $price_spend = full['price_spend'];
            return $price_spend !== null ? '<span class="news-price_spend">' + $price_spend + '</span>' : '-';
          }
        },
        {
          // news description
          targets: 6,
          render: function render(data, type, full, meta) {
            var $description = full['description'];
            return '<span class="news-description">' + $description + '</span>';
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function render(data, type, full, meta) {
            return (
              '<div class="d-flex flex-row">' +
              '<button class="btn btn-sm btn-danger delete-record" data-id="'.concat(
                full['id'],
                '" data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="bx bx-trash me-2"></i>Hapus</button>'
              ) +
              '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>', // Konfigurasi tampilan elemen DOM untuk DataTables
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Cari..'
      }
    });
  }

  // Edit record
  $(document).on('click', '.edit-record', function () {
    var news_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'data-finance/').concat(news_id, '/edit'), function (data) {
      $('#id').val(data.id);
      $('#needs_income').val(data.needs_income);
      $('#price_income').val(data.price_income);
      $('#needs_spend').val(data.needs_spend);
      $('#price_spend').val(data.price_spend);
      $('#description').val(data.description);
    });

    // validating form and updating user's data
    var editData = document.getElementById('editData');

    // user form validation
    var fv = FormValidation.formValidation(editData, {
      fields: {
        title: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        content: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        image: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        status: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          eleValidClass: '',
          rowSelector: function rowSelector(field, ele) {
            // field is the field name & ele is the field element
            return '.fieldnya';
          }
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // adding or updating user when form successfully validate
      $.ajax({
        data: $('#editData').serialize(),
        url: ''.concat(baseUrl, 'data-finance'),
        type: 'POST',
        success: function success(status) {
          dt_ajax.draw();
          modalnya.modal('hide');

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status, '!'),
            text: 'User '.concat(status, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          modalnya.modal('hide');
          Swal.fire({
            title: 'Duplicate Entry!',
            text: 'Your email should be unique.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  });

  // Delete Record
  $(document).on('click', '.delete-record', function () {
    var news_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // sweetalert for confirmation of delete
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      customClass: {
        confirmButton: 'btn btn-primary me-3',
        cancelButton: 'btn btn-label-secondary'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        // delete the data
        $.ajax({
          type: 'DELETE',
          url: ''.concat(baseUrl, 'data-finance/').concat(news_id),
          success: function success() {
            dt_ajax.draw();
          },
          error: function error(_error) {
            console.log(_error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'Deleted!',
          text: 'The user has been deleted!',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'The User is not deleted!',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });

  // Menyesuaikan tampilan elemen input dalam DataTables
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm'); // Menghilangkan kelas form-control-sm pada elemen filter
    $('.dataTables_length .form-select').removeClass('form-select-sm'); // Menghilangkan kelas form-select-sm pada elemen select untuk jumlah data per halaman
  }, 300);
});

('use strict');
(function () {
  let cardColor, headingColor, labelColor, legendColor, borderColor, shadeColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    headingColor = config.colors_dark.headingColor;
    labelColor = config.colors_dark.textMuted;
    legendColor = config.colors_dark.bodyColor;
    borderColor = config.colors_dark.borderColor;
    shadeColor = 'dark';
  } else {
    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    labelColor = config.colors.textMuted;
    legendColor = config.colors.bodyColor;
    borderColor = config.colors.borderColor;
    shadeColor = 'light';
  }

  // Order Summary - Area Chart
  // --------------------------------------------------------------------
  const orderSummaryEl = document.querySelector('#orderSummaryChart'),
    orderSummaryConfig = {
      chart: {
        height: 230,
        type: 'area',
        toolbar: false,
        dropShadow: {
          enabled: true,
          top: 18,
          left: 2,
          blur: 3,
          color: config.colors.primary,
          opacity: 0.15
        }
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: cardColor,
            seriesIndex: 0,
            dataPointIndex: 9,
            strokeColor: config.colors.primary,
            strokeWidth: 4,
            size: 6,
            radius: 2
          }
        ],
        hover: {
          size: 7
        }
      },
      series: [
        {
          data: [15, 18, 13, 19, 16, 31, 18, 26, 23, 39]
        }
      ],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        lineCap: 'round'
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.7,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        show: true,
        borderColor: borderColor,
        padding: {
          top: -15,
          bottom: -10,
          left: 15,
          right: 10
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        labels: {
          offsetX: 0,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        lines: {
          show: false
        }
      },
      yaxis: {
        labels: {
          offsetX: 7,
          formatter: function (val) {
            return '$' + val;
          },
          style: {
            fontSize: '13px',
            colors: labelColor
          }
        },
        min: 0,
        max: 40,
        tickAmount: 4
      }
    };
  if (typeof orderSummaryEl !== undefined && orderSummaryEl !== null) {
    const orderSummary = new ApexCharts(orderSummaryEl, orderSummaryConfig);
    orderSummary.render();
  }
})();
