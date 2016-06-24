<?php	
// Number of inputs
$num_input = 3;
// Number of outputs.
$num_output = 2;
// Number of overall layers. (counting input & output layers)
$num_layers = 3;
// Number of neurons on hidden layer.
$num_neurons_hidden = 3;
// Continue learning process until the error is very small(0.001)
// Or if the iteration passes 500000 times.
$desired_error = 0.001;
$max_epochs = 500000;

$ann = fann_create_standard($num_layers, $num_input, $num_neurons_hidden, $num_output);

if ($ann) {
    fann_set_activation_function_hidden($ann, FANN_SIGMOID_SYMMETRIC);
    fann_set_activation_function_output($ann, FANN_SIGMOID_SYMMETRIC);

    $filename = dirname(__FILE__) . "/input.dataset";
	$train_data = fann_read_train_from_file( $filename );

    if ( fann_train_on_data($ann, $train_data, $max_epochs, null, $desired_error))
        fann_save($ann, dirname(__FILE__) . "/langDetector.net");

    $mse = fann_get_MSE($ann);
    echo "<p>Your Artificial Neural Network has been created, You can see it in 'langDetector.net' file.</p>";
    echo "<p>The MSE (Mean Squared Error) is: {$mse} (close to zero means better)";

    fann_destroy($ann);
}
