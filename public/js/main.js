        //Modal Controll
        $(function(){
        	
        	//Alternative Control Js
        	//Add data
            $(document).on('click','.addAlternative', function(e){
                e.preventDefault();
                $("#add").modal('show');
            });
            
            // Ubah Data
            $(document).on('click','.updateAlternative', function(e){
                e.preventDefault();
                $("#update").modal('show');
                
                var id =$(this).attr('data-id'); 
                 $.get('updateAlternative/' + $(this).attr('data-id'),
                    {id:$(this).attr('data-id')},
                    function(html){
                        $('#id').val(id);
                        $('#kodeKaryawan').val(html.data.kodeKaryawan); 
                        $('#nameUpdate').val(html.data.name); 
                        $('#jabatan').val(html.data.jabatan); 
                        $('#alamat').val(html.data.alamat); 
                        $('#jk').val(html.data.jk); 
                        $('#kontak').val(html.data.kontak); 
                        $('#status').val(html.data.status); 


                            $.each(html.nilai, function( index, value ) {
                                myClass = '.'+value.kriteria_id;
                                  $(myClass).val(value.nilai);
                            });
                    });
            });

            //Delete Data 
            $(document).on('click','.deleteAlternative',function(e){
            	e.preventDefault();
            	$("myDeleteAlternative").modal('show');
            });


            //Kriteria Control Js
           
            //Menambah Data Kriteria
            $(document).on('click','.addKriteria',function(e){
            	e.preventDefault();
            	$("#myAddKriteria").modal('show');
            });

             //Menambah Data Kriteria
            $(document).on('click','.addBobot',function(e){
                e.preventDefault();
                $("#myAddKriteria").modal('show');
            });
            
            //merubah Data Kriteria
			$(document).on('click','.updateKriteria', function(e){
                e.preventDefault();
                $("#updateKriteria").modal('show');
                  var id = $(this).attr('data-id');
                  var name = $(this).attr('data-name');
                 $.get('updateKriteria/' + $(this).attr('data-id'),
                    {id:$(this).attr('data-id')},
                    function(html){
                       $('#id').val(id);  
                       $('#nameKriteria').val(name);
                       $('#bobotKriteria').val(html);
                    }   
                );
            });

            //Menambah Data Kriteria

            $(document).on('click','.deleteKriteria',function(e){
            	e.preventDefault();
            	$("myDeleteKriteria").modal('show');
            });
        });

        


        /*Graph*/
        
    window.onload = function() {
        var ctx = document.getElementById("chart-area");
        window.myPolarArea = Chart.PolarArea(ctx, config);
    };