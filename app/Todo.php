<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    protected $table = 'todos';

    // bladeのformのname属性を持ってくる
    protected $fillable = [
        'content'
    ];
}
// dd('modelの中');
// オーバーライドの条件を調べる
// クラス内todo.phpと継承元model.phpとsoftdeletedのメソッドの優先順位が重要

// オーバライド
/*
classの中でuseされているものが優先的に使われるため、ModelにもSoftDeletesにもある
performDeleteOnModelはuseされているSoftDeletesの方が選択的に使われる
*/

/* trait
クラスの内でuseされるオブジェクトのようなもの。
複数のクラスで使われる処理をまとめたいときに使う。
こうすることで複数のクラスで同じ処理を書かなくて済む
*/

/* チェックリスト
ルートネームはurlの名前を変える度に、更新をしないで済むように。
ルートパラメーターはある特定のレコードを動的に取得する必要か必要でないか

関数別に一々取得するコードを書かないといけなるから。
_tokenやsessionの情報を取得し、セキュリティを強めるため。

Modelは、DBからデータの取り出し処理を記述する。
Eloquentは、laravel特有のORM。ORMとはSQLを直で書かずに、用意してもらった
便利なメソッドが使えるオブジェクトでSQLをかけるもの。Object-Relational Mapping
model経由でDBの中身を書き換えていいものを書いておかないと、変更できない。
fillメソッドを使う場合も必要となる。
foreachで処理しやすくするため

bladeを分けておくと、その中で繰り返し使うものがあれば再利用しやすくなるから
{{!!!!}}はエスケープされない。
@csrfを書いておくと、formでsubmitするときにtokenも一緒に返してくれるようになる。
また検証してくれる。
@includeは指定したファイルの情報を元のファイルに追加する。

git等で管理する際、他の開発者と一緒のデータベースのカラムを簡単に作成できるから。
開発環境は他の開発者と違うため、自分の環境に合った記述をするため
ddがあってデバックしやすい。最低限のセキュリティが最初から準備されている。
mvcアーキテクチャでディレクトリ位置がわかりやすい。追加しやすい。
traitはクラスの中でも継承することができ、クラスのメソッドのようにアロー演算子で呼ぶことができる
classはクラス内で新たなクラスを継承できないので、classだけで処理を完結しようとすると煩雑になる。
venderとはいわば、みんなの教科書みたいなものなので、書き換えたり、書き加えたりしてはいけない。
また、venderはgitignoreされているので、他の開発者がいた場合環境自体に問題が起こる可能性がある。

bladeのメリット
phpだとifやforeachを書く際、echoや{}、クオートなど書くことが多くなって,HTMLが見えにくくなる。
基本的なAuth情報を保持してくれる。セキュリティ対策の一端になる。

route()とは

*/