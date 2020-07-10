<div class="footer pb-3">
    <div class="copyright text-center my-auto">
      <span>Copyright © Website Sekolah 2020</span>
    </div>
</div>

<script>

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

<?php echo $this->session->flashdata('sweetalert')?>

$(function(){
    var current = "<?php echo $this->uri->segment(2) ?>";
    $('a.collapse-item').each(function(){
        var $this = $(this);
        if($this.attr('menu') == current){
            $this.addClass('active');
            $(this.parentNode.parentNode).addClass('show');
        }
    })
});
</script>

</body>

</html>
