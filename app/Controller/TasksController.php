<?php
class TasksController extends AppController {
	public $scaffold;
	public $uses = array('Task','User'); // L'ordine è importante!
	
	//Restituisce tutti i task dell'utente passato come parametro
	//Es: per l'utente 2
	//la invoco con http://localhost/managementlab/tasks/usertasks/2
	function usertasks($user_id)
	{
		//Cerco il nome dell'utente $user_id
		$u = $this->User->findById($user_id);
		//Mi passo alla view una variabile $username
		$this->set('u', $u['User']);
		
		//Esegue una query sul DB
		//Select * from tasks where user_id = $user_id order by deadline DESC
		//$t = $this->Task->findByUserId($user_id); -- non funziona per qualche misteriosa ragione
		$t = $this->Task->find('all', array(
						'conditions' => array('Task.user_id' => $user_id),
						'order' => array('Task.deadline DESC')
						)
					);
		
		//Passo alla view il risultato della query
		$this->set('tasks', $t);
		
	}

	public function add()
	{
		//Se il valore del form non è vuoto, allora salvo
		if (!empty($this->request->data)) {
			//Salva nel task i valori passati dal form
			//$result->data contiene tutti valori contenuti nei campi del form
			//Fa una INSERT nel DB
			if ($this->Task->save($this->request->data) )
			{
				//Salvato con successo
				$this->Session->setFlash('Salvato con successo');
				return $this->redirect('index');
			}
			else
			{
				//Mostro un errore				
				$this->Session->setFlash('Errore surante il salvataggio');
			}
		}
		
		//Preparo le liste per le tendine
		//Notare che se uso nomi standard non devo fare nulla nella view		
		$elenco_utenti = $this->Task->User->find('list');
		$projects = $this->Task->Project->find('list');
		$tasks = $this->Task->find('list');

		//Sintassi abbreviata per non dover scrivere tante volte la stessa cosa
		//$this->set('users', $users);
		$this->set(compact('elenco_utenti', 'projects','tasks'));
		
	}

	public function edit($id = null)
	{
		//Se non c'è l'id del record da modificare nell'URL ti butto fuori
		if (empty($id))
		{
			$this->Session->setFlash('Non hai specificato il task da modificare');
			return $this->redirect('index');
		}

		//Se il form è stato compilato provo a salvare
		if (!empty($this->request->data)) {
			if ($this->Task->save($this->request->data) )
			{
				//Salvato con successo
				$this->Session->setFlash('Salvato con successo');
				return $this->redirect('index');
			}
			else
			{
				//Mostro un errore				
				$this->Session->setFlash('Errore surante il salvataggio');
			}
		}

		//Se il form non è ancora compilato leggo i valori di default
		$this->data = $this->Task->findById($id);

		//Escludo questo task dai task padre
		$conditions['id !='] = $id;
		//Solo i task dello stesso progetto
		$conditions['project_id'] = $this->data['Task']['project_id'];

		//Preparo le liste per le tendine
		//Notare che se uso nomi standard non devo fare nulla nella view		
		$users = $this->Task->User->find('list');
		$projects = $this->Task->Project->find('list');
		$tasks = $this->Task->find('list', array('conditions'=> $conditions));

		//Sintassi abbreviata per non dover scrivere tante volte la stessa cosa
		//$this->set('users', $users);
		$this->set(compact('users', 'projects','tasks'));
	}

	public function index()
	{
		$this->Task->Project->recursive = 2;
		$projects = $this->Task->Project->find('all');
		$this->set('projects', $projects);
	}

	public function complete($id)
	{
		$this->layout='ajax';
		$this->autoRender = false;

		//Tolgo la ricorsione
		$this->Task->recursive = -1;

		//Cerco il task che mi hai passato
		$t = $this->Task->findById($id);

		//Inverto il valore di complete
		$t['Task']['complete'] = !$t['Task']['complete'];
		
		//Salvo il risultato
		$this->Task->save($t);
	}

    public function star($id)
	{
		$this->layout='ajax';
		$this->autoRender = false;

		//Tolgo la ricorsione
		$this->Task->recursive = -1;

		//Cerco il task che mi hai passato
		$t = $this->Task->findById($id);

		//Inverto il valore di complete
		$t['Task']['starred'] = !$t['Task']['starred'];
		
		//Salvo il risultato
		return $this->Task->save($t);
        
	}
}
