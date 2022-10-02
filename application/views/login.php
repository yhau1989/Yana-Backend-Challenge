<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php

class Input
{
  public $id;
  public $type;
  public $name;
  public $placeholder;

  function __construct($id, $type, $name, $placeholder)
  {
    $this->id = $id;
    $this->type = $type;
    $this->name = $name;
    $this->placeholder = $placeholder;
  }
}

$iEmail = new Input('emailI', 'email', 'email', 'Correo electronico');
$iPassword = new Input('passwordI', 'password', 'password', 'Contraseña');

$inputs = array($iEmail, $iPassword)


?>


<?php $this->html->head(); ?>

<main class="m-4">
  <section class="w-full px-8 py-16 xl:px-8">
    <div class="max-w-5xl mx-auto">
      <div class="flex flex-col items-center md:flex-row">
        <div class="w-full space-y-5 md:w-3/5 md:pr-16">
          <p class="font-medium text-blue-500 uppercase">
            Portal de administración
          </p>
          <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
            Yana
          </h2>
          <p class="text-xl text-gray-600 md:pr-16">
            Si no tiene usuario para ingresar comuniquese con al administrador
            del sitio para generar su nuevo usuario.
          </p>
        </div>

        <div class="w-full mt-16 md:mt-0 md:w-2/5">
          <form method="post" accept-charset="utf-8" id="form_login" class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
            <h3 class="mb-6 text-2xl font-medium text-center">Login</h3>
            <?php foreach ($inputs as $input) : ?>
              <?php if ($input->id == 'emailI' && isset($user)) { ?>
                <div class="mt-4">
                  <input class="block w-full px-4 py-3 text-sm font-extralight tracking-wide  border border-transparent border-gray-200 rounded-md  focus:ring-blue-500 focus:outline-none" id="<?= $input->id; ?>" name="<?= $input->name; ?>" type="<?= $input->type; ?>" placeholder="<?= $input->placeholder; ?>" autocomplete="off" value="<?= $user; ?>">
                </div>
              <?php } else { ?>
                <div class="mt-4">
                  <input class="block w-full px-4 py-3 text-sm font-extralight tracking-wide  border border-transparent border-gray-200 rounded-md  focus:ring-blue-500 focus:outline-none" id="<?= $input->id; ?>" name="<?= $input->name; ?>" type="<?= $input->type; ?>" placeholder="<?= $input->placeholder; ?>" autocomplete="off" required>
                </div>
              <?php } ?>
            <?php endforeach; ?>
            <div class="block mt-4">
              <button type="submit" class="w-full px-3 py-3 font-light text-md text-white bg-blue-600 hover:bg-blue-500 rounded-lg">
                Ingresar
              </button>
            </div>
            <div class="text-red-500 text-xs font-light mt-4">
              <?php echo (isset($data) ? $data : ''); ?>
            </div>

            <p class="w-full mt-4 text-sm text-center text-gray-500">
              Olvido su contraseña?
              <a href="#" class="text-blue-500 underline">Recuperar</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php $this->html->footer(); ?>