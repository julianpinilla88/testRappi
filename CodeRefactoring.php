    <?php
    /**
     * Created by PhpStorm.
     * User: julian
     * Date: 12/4/2016
     * Time: 11:15 a.m.
     */
    class codeRefactoring {
        public function post_confirm() {

            $id = Input::get('service_id');
            $servicio = Service::find($id);

            if ($servicio == NULL){
                return Response::json(array('error' => '3'));
            }
                if ($servicio->status_id == '6') {
                    return Response::json(array('error' => '2'));
                }
                if ($servicio->driver_id != NULL && $servicio->status_id != '1') {
                    return Response::json(array('error' => '1'));
                }
                $driverTmp = Driver::find(Input::get('driver_id'));
                 if ($driverTmp == NULL) {
                return Response::json(['error' => '99']);
                }

            $this->db->trans_start();

            if ($servicio->user->uuid == '') {
                $this->db->trans_rollback();
                return Response::json(array('error' => '0'));
            }

            Service::update($id, array(
                        'driver_id' => $driverTmp->id,
                        'car_id' => $driverTmp->car_id
                    ));

            Driver::update(Input::get('driver_id'), array(
                'available' => '0'
            ));

            $this->sendPushNotification($servicio->user->uuid, 'Tu servicio ha sido confirmado!', 1, 'Open', ['serviceId' => $servicio->id], $servicio->user->type);

            $this->db->trans_complete();

            return Response::json(['error' => '0']);
                    $servicio = Service::find($id);

                    $push = Push::make();



                    if ($servicio->user->type == '1') {
                        $result = $push->ios($servicio->user->uuid, $pushMessage, 1, 'honk.wav', 'Open', array('serviceId' => $servicio->id));
                    } else {
                        $result = $push->android2($servicio->user->uuid, $pushMessage, 1, 'default', 'Open', array('serviceId' => $servicio->id));
                    }
        }



        private function sendPushNotification($uuid, $pushMessage, $option, $open, $payload, $platform) {
            $push = Push::make();
            if ($platform == '1') {
                $push->ios($uuid, $pushMessage, $option, 'honk.wav', $open, $payload);
            } else {
                $push->android2($uuid, $pushMessage, $option, 'default', $open, $payload);

            }
        }
    }

